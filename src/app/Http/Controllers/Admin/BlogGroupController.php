<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogGroup;

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

        $list = BlogGroup::query();
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
        $data = BlogGroup::findOrFail($id);
        return view('admin.blog_group.detail', compact('data'));
    }

    /**
     * Tạo tài khoản
     */
    public function create()
    {
        try {
            DB::beginTransaction();
            $data = request()->all();
            $data['password'] = Hash::make($data['password']);
            $data['active'] = isset($data['active']) && $data['active'] == Admin::STATUS_ACTIVE ? Admin::STATUS_ACTIVE : Admin::STATUS_ACTIVE;
            $data = Admin::create($data);
            DB::commit();
            admin_save_log("Quản trị viên #$data->name vừa mới được tạo", route("admin.admin.detail", ['id' => $data->id]), $this->admin->id);
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
     * Cập nhật thông tin tài khoản
     */
    public function update()
    {
        try {
            DB::beginTransaction();
            $id = request('id', '');
            $data = Admin::findOrFail($id);
            $_request = request()->only('name', 'role_id', 'status');
            $data['status'] = isset($_request['status']) && $_request['status'] == Admin::STATUS_ACTIVE ? Admin::STATUS_ACTIVE : Admin::STATUS_BLOCKED;
            $data->update($_request);
            DB::commit();
            admin_save_log("Quản trị viên #$data->name vừa mới được cập nhật thông tin cá nhân", route("admin.admin.detail", ['id' => $data->id]), $this->admin->id);
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
}
