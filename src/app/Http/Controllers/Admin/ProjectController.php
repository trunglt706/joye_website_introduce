<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    protected $limit_default, $admin, $dir;

    public function __construct()
    {
        $this->limit_default = 10;
        $this->admin = auth('admin')->user();
        $this->dir = 'uploads/project';
    }

    /**
     * Trang quản lý faq
     */
    public function index()
    {
        $data = [
            'status' => Project::get_status(),
            'group' => get_service_groups(),
        ];
        return view('admin.project.index', compact('data'));
    }

    /**
     * Danh sách faq
     */
    public function table()
    {
        $limit = request('limit', $this->limit_default);
        $search = request('search', '');
        $status = request('status', '');
        $group_id = request('group_id', '');

        $list = Project::query();
        $list = $search != '' ? $list->search($search) : $list;
        $list = $status != '' ? $list->ofStatus($status) : $list;
        $list = $group_id != '' ? $list->groupId($group_id) : $list;
        $list = $list->latest()->paginate($limit);

        return response()->json([
            'status' => 200,
            'data' => view('admin.project.table', compact('list'))->render()
        ]);
    }

    /**
     * Chi tiết faq
     */
    public function detail($id)
    {
        $data = Project::findOrFail($id);
        $groups = get_service_groups();
        return view('admin.project.detail', compact('data', 'groups'));
    }

    /**
     * Tạo faq
     */
    public function create()
    {
        try {
            DB::beginTransaction();
            $data = request()->all();
            $data['status'] = isset($data['status']) && $data['status'] == Project::STATUS_ACTIVE ? Project::STATUS_ACTIVE : Project::STATUS_BLOCKED;
            if (request()->hasFile('image')) {
                $file = request()->file('image');
                $data['image'] = store_file($file, $this->dir, false, 500, 500);
            }
            $data = Project::create($data);
            DB::commit();
            admin_save_log("Dự án #$data->name vừa mới được tạo", route("admin.project.detail", ['id' => $data->id]), $this->admin->id);
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
            $data = Project::findOrFail($id);
            $_request = request()->all();
            if (request()->hasFile('image')) {
                delete_file($data->image);
                $file = request()->file('image');
                $_request['image'] = store_file($file, $this->dir, false, 500, 500);
            }
            $data['status'] = isset($_request['status']) && $_request['status'] == Project::STATUS_ACTIVE ? Project::STATUS_ACTIVE : Project::STATUS_BLOCKED;
            $data->update($_request);
            DB::commit();
            admin_save_log("Dự án #$data->name vừa mới được cập nhật thông", route("admin.project.detail", ['id' => $data->id]), $this->admin->id);
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
     * Xóa Dự án
     */
    public function destroy()
    {
        DB::beginTransaction();
        try {
            $data = Project::find(request('id'));
            if (!is_null($data)) {
                $data->delete();
                admin_save_log("Dự án #$data->name vừa mới bị xóa");
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
