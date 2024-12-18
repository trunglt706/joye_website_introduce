<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    protected $limit_default, $admin, $dir;

    public function __construct()
    {
        $this->limit_default = 10;
        $this->admin = auth('admin')->user();
        $this->dir = 'uploads/service';
    }

    /**
     * Trang quản lý dịch vụ
     */
    public function index()
    {
        $data = [
            'status' => Service::get_status(),
            'group' => get_service_groups(),
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
        $group_id = request('group_id', '');

        $list = Service::query();
        $list = $search != '' ? $list->search($search) : $list;
        $list = $status != '' ? $list->ofStatus($status) : $list;
        $list = $group_id != '' ? $list->groupId($group_id) : $list;
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
        $groups = get_service_groups();
        return view('admin.service.detail', compact('data', 'groups'));
    }

    /**
     * Tạo Dịch vụ
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
            if (request()->hasFile('icon')) {
                $file = request()->file('icon');
                $data['icon'] = store_file($file, $this->dir, false, 100, 100);
            }
            $data['status'] = isset($data['status']) && $data['status'] == Service::STATUS_ACTIVE ? Service::STATUS_ACTIVE : Service::STATUS_BLOCKED;
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
            $_request['status'] = isset($_request['status']) && $_request['status'] == Service::STATUS_ACTIVE ? Service::STATUS_ACTIVE : Service::STATUS_BLOCKED;
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

    /**
     * Xóa dịch vụ
     */
    public function destroy()
    {
        DB::beginTransaction();
        try {
            $data = Service::find(request('id'));
            if (!is_null($data)) {
                $data->delete();
                admin_save_log("Dịch vụ #$data->name vừa mới bị xóa");
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
