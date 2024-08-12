<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    protected $limit_default, $admin;

    public function __construct()
    {
        $this->limit_default = 10;
        $this->admin = auth('admin')->user();
    }

    /**
     * Trang quản lý dịch vụ
     */
    public function index()
    {
        $data = [
            'status' => Service::get_status(),
        ];
        return view('admin.service.index', compact('data'));
    }

    /**
     * Danh sách dịch vụ
     */
    public function table()
    {
        $limit = request('limit', $this->limit_default);
        $search = request('search', '');
        $status = request('status', '');

        $list = Service::query();
        $list = $search != '' ? $list->search($search) : $list;
        $list = $status != '' ? $list->ofStatus($status) : $list;
        $list = $list->latest()->paginate($limit);

        return response()->json([
            'status' => 200,
            'data' => view('admin.service.table', compact('list'))->render()
        ]);
    }

    /**
     * Chi tiết dịch vụ
     */
    public function detail($id)
    {
        $data = Service::findOrFail($id);
        return view('admin.service.detail', compact('data'));
    }

    /**
     * Tạo Dịch vụ
     */
    public function create()
    {
        try {
            DB::beginTransaction();
            $data = request()->all();
            $data['active'] = isset($data['active']) && $data['active'] == Service::STATUS_ACTIVE ? Service::STATUS_ACTIVE : Service::STATUS_ACTIVE;
            $data = Service::create($data);
            DB::commit();
            admin_save_log("Dịch vụ #$data->name vừa mới được tạo", route("admin.service.detail", ['id' => $data->id]), $this->admin->id);
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
     * Cập nhật thông tin Dịch vụ
     */
    public function update()
    {
        try {
            DB::beginTransaction();
            $id = request('id', '');
            $data = Service::findOrFail($id);
            $_request = request()->only('name', 'image', 'content', 'status');
            $data['status'] = isset($_request['status']) && $_request['status'] == Service::STATUS_ACTIVE ? Service::STATUS_ACTIVE : Service::STATUS_BLOCKED;
            $data->update($_request);
            DB::commit();
            admin_save_log("Dịch vụ #$data->name vừa mới được cập nhật thông tin", route("admin.service.detail", ['id' => $data->id]), $this->admin->id);
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
