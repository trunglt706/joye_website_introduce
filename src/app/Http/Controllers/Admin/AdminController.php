<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
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
            'status' => Admin::get_status(),
        ];
        return view('admin.admin.index', compact('data'));
    }

    /**
     * Danh sách admin
     */
    public function table()
    {
        $limit = request('limit', $this->limit_default);
        $search = request('search', '');
        $status = request('status', '');

        $list = Admin::query();
        $list = $search != '' ? $list->search($search) : $list;
        $list = $status != '' ? $list->ofStatus($status) : $list;
        $list = $list->latest()->paginate($limit);

        return response()->json([
            'status' => 200,
            'data' => view('admin.admin.table', compact('list'))->render()
        ]);
    }

    /**
     * Chi tiết admin
     */
    public function detail($id)
    {
        $data = Admin::findOrFail($id);
        return view('admin.admin.detail', compact('data'));
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
            $data['status'] = isset($data['status']) && $data['status'] == Admin::STATUS_ACTIVE ? Admin::STATUS_ACTIVE : Admin::STATUS_BLOCKED;
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
            $_request = request()->all();
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

    /**
     * Cập nhật thông tin đăng nhập
     */
    public function update_account()
    {
        try {
            DB::beginTransaction();
            $id = request('id', '');
            $data = Admin::findOrFail($id);
            $data->password = Hash::make(request('new_password'));
            $data->save();
            DB::commit();
            admin_save_log("Quản trị viên #$data->name vừa mới được cập nhật mật khẩu", route("admin.admin.detail", ['id' => $data->id]), $this->admin->id);
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
     * Xóa quản trị viên
     */
    public function destroy()
    {
        DB::beginTransaction();
        try {
            $data = Admin::where('id', '<>', $this->admin->id)->find(request('id'));
            if (!is_null($data)) {
                $data->delete();
                admin_save_log("Quản trị viên #$data->name vừa mới bị xóa");
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
