<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceGroup;
use Illuminate\Support\Facades\DB;

class ServiceGroupController extends Controller
{
    protected $limit_default, $admin, $dir;

    public function __construct()
    {
        $this->limit_default = 10;
        $this->admin = auth('admin')->user();
        $this->dir = 'uploads/service_group';
    }

    /**
     * Trang quản lý Nhóm dịch vụ
     */
    public function index()
    {
        $data = [
            'status' => ServiceGroup::get_status(),
        ];
        return view('admin.service_group.index', compact('data'));
    }

    /**
     * Danh sách Nhóm dịch vụ
     */
    public function table()
    {
        $limit = request('limit', $this->limit_default);
        $search = request('search', '');
        $status = request('status', '');

        $list = ServiceGroup::withCount('services');
        $list = $search != '' ? $list->search($search) : $list;
        $list = $status != '' ? $list->ofStatus($status) : $list;
        $list = $list->latest()->paginate($limit);

        return response()->json([
            'status' => 200,
            'data' => view('admin.service_group.table', compact('list'))->render()
        ]);
    }

    /**
     * Chi tiết Nhóm dịch vụ
     */
    public function detail($id)
    {
        $data = ServiceGroup::withCount('services')->findOrFail($id);
        return view('admin.service_group.detail', compact('data'));
    }

    /**
     * Tạo Nhóm dịch vụ
     */
    public function create()
    {
        try {
            DB::beginTransaction();
            $data = request()->all();
            $data['active'] = isset($data['active']) && $data['active'] == ServiceGroup::STATUS_ACTIVE ? ServiceGroup::STATUS_ACTIVE : ServiceGroup::STATUS_BLOCKED;

            if (request()->hasFile('image')) {
                $file = request()->file('image');
                $data['image'] = store_file($file, $this->dir, false, 500, 500);
            }
            if (request()->hasFile('icon')) {
                $file = request()->file('icon');
                $data['icon'] = store_file($file, $this->dir, false, 100, 100);
            }
            $data = ServiceGroup::create($data);
            DB::commit();
            admin_save_log("Nhóm dịch vụ #$data->name vừa mới được tạo", route("admin.service_group.detail", ['id' => $data->id]), $this->admin->id);
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
     * Cập nhật thông tin Nhóm dịch vụ
     */
    public function update()
    {
        try {
            DB::beginTransaction();
            $id = request('id', '');
            $data = ServiceGroup::findOrFail($id);
            $_request = request()->all();
            if (request()->hasFile('image')) {
                delete_file($data->image);
                $file = request()->file('image');
                $_request['image'] = store_file($file, $this->dir, false, 500, 500);
            }
            if (request()->hasFile('icon')) {
                delete_file($data->icon);
                $file = request()->file('icon');
                $_request['icon'] = store_file($file, $this->dir, false, 100, 100);
            }
            $data['status'] = isset($_request['status']) && $_request['status'] == ServiceGroup::STATUS_ACTIVE ? ServiceGroup::STATUS_ACTIVE : ServiceGroup::STATUS_BLOCKED;
            $data->update($_request);
            DB::commit();
            admin_save_log("Nhóm dịch vụ #$data->name vừa mới được cập nhật thông tin", route("admin.service_group.detail", ['id' => $data->id]), $this->admin->id);
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
     * Xóa Nhóm dịch vụ
     */
    public function destroy()
    {
        DB::beginTransaction();
        try {
            $data = ServiceGroup::withCount('services')->find(request('id'));
            if (!is_null($data) && $data->services_count == 0) {
                $data->delete();
                admin_save_log("Nhóm dịch vụ #$data->name vừa mới bị xóa");
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
