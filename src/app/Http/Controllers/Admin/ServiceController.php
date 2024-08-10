<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;

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
}
