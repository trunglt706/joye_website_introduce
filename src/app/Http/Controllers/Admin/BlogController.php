<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogGroup;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    protected $limit_default, $admin, $dir;

    public function __construct()
    {
        $this->limit_default = 10;
        $this->admin = auth('admin')->user();
        $this->dir = 'uploads/blog';
    }

    /**
     * Trang quản lý admin
     */
    public function index()
    {
        $data = [
            'status' => Blog::get_status(),
            'group' => get_blog_groups(),
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
            'group' => get_blog_groups(),
        ];
        return view('admin.blog.detail', compact('data'));
    }

    /**
     * Hàm thêm mới bài viết
     */
    public function create()
    {
        try {
            DB::beginTransaction();
            $data = request()->all();
            if (request()->hasFile('image')) {
                $file = request()->file('image');
                $data['image'] = store_file($file, $this->dir, false, 500, 500);
            }
            if (request()->hasFile('background')) {
                $file = request()->file('background');
                $data['background'] = store_file($file, $this->dir, false, 1500, 1500);
            }
            $data['active'] = isset($data['active']) && $data['active'] == Blog::STATUS_ACTIVE ? Blog::STATUS_ACTIVE : Blog::STATUS_BLOCKED;
            $data = Blog::create($data);
            DB::commit();
            admin_save_log("Bài viết #$data->name vừa mới được tạo", route("admin.blog.detail", ['id' => $data->id]), $this->admin->id);
            return response()->json([
                'status' => 200,
                'message' => 'Tạo mới thành công',
                'type' => 'success',
            ]);
        } catch (\Throwable $th) {
            showLog($th);
            DB::rollBack();
            return response()->json([
                'status' => 500,
                'message' => 'Lỗi tạo mới',
                'type' => 'error'
            ]);
        }
    }

    /**
     * Cập nhật thông tin bài viết
     */
    public function update()
    {
        try {
            DB::beginTransaction();
            $_request = request()->all();
            $data = Blog::findOrFail(request('id', ''));
            if (request()->hasFile('image')) {
                delete_file($data->image);
                $file = request()->file('image');
                $_request['image'] = store_file($file, $this->dir, false, 500, 500);
            }
            if (request()->hasFile('background')) {
                delete_file($data->background);
                $file = request()->file('background');
                $_request['background'] = store_file($file, $this->dir, false, 1500, 1500);
            }
            $_request['status'] = isset($_request['status']) && $_request['status'] == Blog::STATUS_ACTIVE ? Blog::STATUS_ACTIVE : Blog::STATUS_BLOCKED;
            $data->update($_request);
            DB::commit();
            admin_save_log("Bài viết #$data->name vừa mới được cập nhật thông tin", route("admin.blog.detail", ['id' => $data->id]), $this->admin->id);
            return response()->json([
                'status' => 200,
                'message' => 'Cập nhật thành công',
                'type' => 'success'
            ]);
        } catch (\Throwable $th) {
            showLog($th);
            DB::rollBack();
            return response()->json([
                'status' => 500,
                'message' => 'Lỗi cập nhật',
                'type' => 'error'
            ]);
        }
    }

    /**
     * Xóa bài viết
     */
    public function destroy()
    {
        DB::beginTransaction();
        try {
            $data = Blog::find(request('id'));
            if (!is_null($data)) {
                $data->delete();
                admin_save_log("Bài viết #$data->name vừa mới bị xóa");
                DB::commit();
                return response()->json([
                    'status' => 200,
                    'message' => 'Xóa thành công',
                    'type' => 'success',
                ]);
            }
        } catch (\Throwable $th) {
            showLog($th);
        }
        DB::rollBack();
        return response()->json([
            'status' => 500,
            'message' => 'Có lỗi xãy ra!',
            'type' => 'error',
        ]);
    }
}
