<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    protected $limit_default, $admin;

    public function __construct()
    {
        $this->limit_default = 10;
        $this->admin = auth('admin')->user();
    }

    /**
     * Trang quản lý faq
     */
    public function index()
    {
        $data = [
            'status' => Question::get_status(),
        ];
        return view('admin.faq.index', compact('data'));
    }

    /**
     * Danh sách faq
     */
    public function table()
    {
        $limit = request('limit', $this->limit_default);
        $search = request('search', '');
        $status = request('status', '');

        $list = Question::query();
        $list = $search != '' ? $list->search($search) : $list;
        $list = $status != '' ? $list->ofStatus($status) : $list;
        $list = $list->latest()->paginate($limit);

        return response()->json([
            'status' => 200,
            'data' => view('admin.faq.table', compact('list'))->render()
        ]);
    }

    /**
     * Chi tiết faq
     */
    public function detail($id)
    {
        $data = Question::findOrFail($id);
        return view('admin.faq.detail', compact('data'));
    }

    /**
     * Tạo faq
     */
    public function create()
    {
        try {
            DB::beginTransaction();
            $data = request()->all();
            $data['active'] = isset($data['active']) && $data['active'] == Question::STATUS_ACTIVE ? Question::STATUS_ACTIVE : Question::STATUS_ACTIVE;
            $data = Question::create($data);
            DB::commit();
            admin_save_log("Câu hỏi #$data->name vừa mới được tạo", route("admin.faq.detail", ['id' => $data->id]), $this->admin->id);
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
            $data = Question::findOrFail($id);
            $_request = request()->only('name', 'description', 'status');
            $data['status'] = isset($_request['status']) && $_request['status'] == Question::STATUS_ACTIVE ? Question::STATUS_ACTIVE : Question::STATUS_BLOCKED;
            $data->update($_request);
            DB::commit();
            admin_save_log("Câu hỏi #$data->name vừa mới được cập nhật thông tin", route("admin.faq.detail", ['id' => $data->id]), $this->admin->id);
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
     * Xóa câu hỏi
     */
    public function destroy()
    {
        DB::beginTransaction();
        try {
            $data = Question::find(request('id'));
            if (!is_null($data)) {
                $data->delete();
                admin_save_log("Câu hỏi #$data->name vừa mới bị xóa");
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
