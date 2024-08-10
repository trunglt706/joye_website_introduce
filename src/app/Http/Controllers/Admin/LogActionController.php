<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AdminLog;

class LogActionController extends Controller
{
    protected $limit_default, $admin;

    public function __construct()
    {
        $this->limit_default = 10;
        $this->admin = auth('admin')->user();
    }

    /**
     * Trang lịch sử hoạt động
     */
    public function index()
    {
        $data = [
            'admins' => Admin::select('id', 'name')->get(),
        ];
        return view('admin.log_action.index', compact('data'));
    }

    /**
     * Lấy danh sách hành động theo điều kiện
     */
    public function table()
    {
        $limit = request('limit', $this->limit_default);
        $date = request('date', '');
        $admin_id = request('admin_id', '');
        $search = request('search', '');

        $list = AdminLog::query();
        $list = $date != '' ? $list->ofDate($date) : $list;
        $list = $admin_id != '' ? $list->adminId($admin_id) : $list;
        $list = $search != '' ? $list->search($search) : $list;

        $list = $list->latest()->paginate($limit);
        return response()->json([
            'status' => 200,
            'data' => view('admin.log_action.table', compact('list'))->render()
        ]);
    }

    /**
     * Trang chi tiết hành động
     */
    public function detail($id)
    {
        $data = AdminLog::with('admin')->find($id);
        if ($data) {
            return view('admin.log_action.detail', compact('data'));
        }
        return redirect()->back()->with('error', 'Không tìm thấy dữ liệu!');
    }
}
