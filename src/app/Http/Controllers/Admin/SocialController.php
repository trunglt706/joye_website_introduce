<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Social;

class SocialController extends Controller
{
    protected $limit_default, $admin, $dir;

    public function __construct()
    {
        $this->limit_default = 10;
        $this->admin = auth('admin')->user();
        $this->dir = 'uploads/social';
    }

    /**
     * Trang quản lý faq
     */
    public function index()
    {
        $data = [
            'status' => Social::get_status(),
        ];
        return view('admin.social.index', compact('data'));
    }

    /**
     * Danh sách faq
     */
    public function table()
    {
        $limit = request('limit', $this->limit_default);
        $search = request('search', '');
        $status = request('status', '');

        $list = Social::query();
        $list = $search != '' ? $list->search($search) : $list;
        $list = $status != '' ? $list->ofStatus($status) : $list;
        $list = $list->latest()->paginate($limit);

        return response()->json([
            'status' => 200,
            'data' => view('admin.social.table', compact('list'))->render()
        ]);
    }

    /**
     * Chi tiết faq
     */
    public function detail($id)
    {
        $data = Social::findOrFail($id);
        return view('admin.social.detail', compact('data'));
    }

    /**
     * Tạo faq
     */
    public function create()
    {
        try {
            DB::beginTransaction();
            $data = request()->all();
            $data['active'] = isset($data['active']) && $data['active'] == Social::STATUS_ACTIVE ? Social::STATUS_ACTIVE : Social::STATUS_ACTIVE;
            if (request()->hasFile('image')) {
                $file = request()->file('image');
                $data['image'] = store_file($file, $this->dir);
            }
            $data = Social::create($data);
            DB::commit();
            admin_save_log("Mạng liên kết #$data->name vừa mới được tạo", route("admin.social.detail", ['id' => $data->id]), $this->admin->id);
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
            $data = Social::findOrFail($id);
            $_request = request()->only('name', 'link', 'status');
            if (request()->hasFile('image')) {
                delete_file($data->image);
                $file = request()->file('image');
                $_request['image'] = store_file($file, $this->dir);
            }
            $data['status'] = isset($_request['status']) && $_request['status'] == Social::STATUS_ACTIVE ? Social::STATUS_ACTIVE : Social::STATUS_BLOCKED;
            $data->update($_request);
            DB::commit();
            admin_save_log("Mạng liên kết #$data->name vừa mới được cập nhật thông", route("admin.social.detail", ['id' => $data->id]), $this->admin->id);
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
     * Xóa Mạng liên kết
     */
    public function destroy()
    {
        DB::beginTransaction();
        try {
            $data = Social::find(request('id'));
            if (!is_null($data)) {
                $data->delete();
                admin_save_log("Mạng liên kết #$data->name vừa mới bị xóa");
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
