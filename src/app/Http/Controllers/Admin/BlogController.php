<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogGroup;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    protected $limit_default, $admin;

    public function __construct()
    {
        $this->limit_default = 10;
        $this->admin = auth('admin')->user();
    }

    /**
     * Trang quản lý admin
     */
    public function index()
    {
        $data = [
            'status' => Blog::get_status(),
            'group' => BlogGroup::ofStatus(BlogGroup::STATUS_ACTIVE)->select('id', 'name')->get(),
        ];
        return view('admin.blog.index', compact('data'));
    }

    /**
     * Danh sách bài viết
     */
    public function table()
    {
        $limit = request('limit', $this->limit_default);
        $search = request('search', '');
        $status = request('status', '');
        $group_id = request('group_id', '');

        $list = Blog::query();
        $list = $search != '' ? $list->search($search) : $list;
        $list = $status != '' ? $list->ofStatus($status) : $list;
        $list = $group_id != '' ? $list->groupId($group_id) : $list;
        $list = $list->latest()->paginate($limit);

        return response()->json([
            'status' => 200,
            'data' => view('admin.blog.table', compact('list'))->render()
        ]);
    }

    /**
     * Chi tiết bài viết
     */
    public function detail($id)
    {
        $data = [
            'blog' => Blog::findOrFail($id),
            'group' => BlogGroup::ofStatus(BlogGroup::STATUS_ACTIVE)->select('id', 'name')->get(),
        ];
        return view('admin.blog.detail', compact('data'));
    }

    /**
     * Chuyến đến trang tạo bài viết
     */
    public function create()
    {
        $data = [
            'group' => BlogGroup::ofStatus(BlogGroup::STATUS_ACTIVE)->select('id', 'name')->get(),
        ];
        return view('admin.blog.create', compact('data'));
    }

    /**
     * Hàm thêm mới bài viết
     */
    public function insert()
    {
        try {
            DB::beginTransaction();
            $data = request()->all();
            $data = Blog::create($data);
            DB::commit();
            return redirect()->back()->with('success', 'Tạo mới bài viết thành công');
        } catch (\Throwable $th) {
            showLog($th);
            DB::rollBack();
            return redirect()->back()->with('error', 'Tạo mới bài viết thất bại!');
        }
    }

    /**
     * Cập nhật thông tin bài viết
     */
    public function update($id)
    {
        try {
            DB::beginTransaction();
            $_request = request()->all();
            $data = Blog::findOrFaild(request('id', ''));
            $data->update($_request);
            DB::commit();
            return redirect()->back()->with('success', 'Cập nhật bài viết thành công');
        } catch (\Throwable $th) {
            showLog($th);
            DB::rollBack();
            return redirect()->back()->with('error', 'Cập nhật bài viết thất bại!');
        }
    }
}
