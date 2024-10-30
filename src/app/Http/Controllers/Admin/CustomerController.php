<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    protected $limit_default, $admin, $dir;

    public function __construct()
    {
        $this->limit_default = 10;
        $this->admin = auth('admin')->user();
        $this->dir = 'uploads/customer';
    }

    /**
     * Trang quản lý faq
     */
    public function index()
    {
        $data = [
            'status' => Customer::get_status(),
        ];
        return view('admin.customer.index', compact('data'));
    }

    /**
     * Danh sách faq
     */
    public function table()
    {
        $limit = request('limit', $this->limit_default);
        $search = request('search', '');
        $status = request('status', '');

        $list = Customer::query();
        $list = $search != '' ? $list->search($search) : $list;
        $list = $status != '' ? $list->ofStatus($status) : $list;
        $list = $list->latest()->paginate($limit);

        return response()->json([
            'status' => 200,
            'data' => view('admin.customer.table', compact('list'))->render()
        ]);
    }

    /**
     * Chi tiết faq
     */
    public function detail($id)
    {
        $data = Customer::findOrFail($id);
        return view('admin.customer.detail', compact('data'));
    }

    /**
     * Tạo faq
     */
    public function create()
    {
        try {
            DB::beginTransaction();
            $data = request()->all();
            $data['status'] = isset($data['status']) && $data['status'] == Customer::STATUS_ACTIVE ? Customer::STATUS_ACTIVE : Customer::STATUS_BLOCKED;
            if (request()->hasFile('image')) {
                $file = request()->file('image');
                $data['image'] = store_file($file, $this->dir, false, 500, 500);
            }
            $data = Customer::create($data);
            DB::commit();
            admin_save_log("Khách hàng #$data->name vừa mới được tạo", route("admin.customer.detail", ['id' => $data->id]), $this->admin->id);
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
     * Cập nhật thông tin faq
     */
    public function update()
    {
        try {
            DB::beginTransaction();
            $id = request('id', '');
            $data = Customer::findOrFail($id);
            $_request = request()->all();
            if (request()->hasFile('image')) {
                delete_file($data->image);
                $file = request()->file('image');
                $_request['image'] = store_file($file, $this->dir, false, 500, 500);
            }
            $data['status'] = isset($_request['status']) && $_request['status'] == Customer::STATUS_ACTIVE ? Customer::STATUS_ACTIVE : Customer::STATUS_BLOCKED;
            $data->update($_request);
            DB::commit();
            admin_save_log("Khách hàng #$data->name vừa mới được cập nhật thông", route("admin.customer.detail", ['id' => $data->id]), $this->admin->id);
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
     * Xóa Khách hàng
     */
    public function destroy()
    {
        DB::beginTransaction();
        try {
            $data = Customer::find(request('id'));
            if (!is_null($data)) {
                $data->delete();
                admin_save_log("Khách hàng #$data->name vừa mới bị xóa");
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
