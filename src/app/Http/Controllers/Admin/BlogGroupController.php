<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogGroup;
use Illuminate\Support\Facades\DB;

class BlogGroupController extends Controller
{
    protected $limit_default, $admin;

    public function __construct()
    {
        $this->limit_default = 10;
        $this->admin = auth('admin')->user();
    }

    /**
     * Trang quản lý nhóm bài viết
     */
    public function index()
    {
        $data = [
            'status' => BlogGroup::get_status(),
        ];
        return view('admin.blog_group.index', compact('data'));
    }

    /**
     * Danh sách nhóm bài viết
     */
    public function table()
    {
        $limit = request('limit', $this->limit_default);
        $search = request('search', '');
        $status = request('status', '');

        $list = BlogGroup::withCount('blogs');
        $list = $search != '' ? $list->search($search) : $list;
        $list = $status != '' ? $list->ofStatus($status) : $list;
        $list = $list->latest()->paginate($limit);

        return response()->json([
            'status' => 200,
            'data' => view('admin.blog_group.table', compact('list'))->render()
        ]);
    }

    /**
     * Chi tiết nhóm bài viết
     */
    public function detail($id)
    {
        $data = BlogGroup::withCount('blogs')->findOrFail($id);
        return view('admin.blog_group.detail', compact('data'));
    }

    /**
     * Tạo nhóm bài viết
     */
    public function create()
    {
        try {
            DB::beginTransaction();
            $data = request()->all();
            $data['active'] = isset($data['active']) && $data['active'] == BlogGroup::STATUS_ACTIVE ? BlogGroup::STATUS_ACTIVE : BlogGroup::STATUS_ACTIVE;
            $data = BlogGroup::create($data);
            DB::commit();
            admin_save_log("Nhóm bài viết #$data->name vừa mới được tạo", route("admin.blog_group.detail", ['id' => $data->id]), $this->admin->id);
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
     * Cập nhật thông tin nhóm bài viết
     */
    public function update()
    {
        try {
            DB::beginTransaction();
            $id = request('id', '');
            $data = BlogGroup::findOrFail($id);
            $_request = request()->only('name', 'image', 'status');
            $data['status'] = isset($_request['status']) && $_request['status'] == BlogGroup::STATUS_ACTIVE ? BlogGroup::STATUS_ACTIVE : BlogGroup::STATUS_BLOCKED;
            $data->update($_request);
            DB::commit();
            admin_save_log("Nhóm bài viết #$data->name vừa mới được cập nhật thông tin", route("admin.blog_group.detail", ['id' => $data->id]), $this->admin->id);
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
     * Xóa nhóm bài viết
     */
    public function destroy()
    {
        DB::beginTransaction();
        try {
            $data = BlogGroup::withCount('blogs')->find(request('id'));
            if (!is_null($data) && $data->blogs_count == 0) {
                $data->delete();
                admin_save_log("Nhóm bài viết #$data->name vừa mới bị xóa");
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
