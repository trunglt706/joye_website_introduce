<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogGroup;

class BlogGroupController extends Controller
{
    protected $limit_default, $admin;

    public function __construct()
    {
        $this->limit_default = 10;
        $this->admin = auth('admin')->user();
    }

    /**
     * Trang quản lý nhóm bài viết
     */
    public function index()
    {
        $data = [
            'status' => BlogGroup::get_status(),
        ];
        return view('admin.blog_group.index', compact('data'));
    }

    /**
     * Danh sách nhóm bài viết
     */
    public function table()
    {
        $limit = request('limit', $this->limit_default);
        $search = request('search', '');
        $status = request('status', '');

        $list = BlogGroup::query();
        $list = $search != '' ? $list->search($search) : $list;
        $list = $status != '' ? $list->ofStatus($status) : $list;
        $list = $list->latest()->paginate($limit);

        return response()->json([
            'status' => 200,
            'data' => view('admin.blog_group.table', compact('list'))->render()
        ]);
    }

    /**
     * Chi tiết nhóm bài viết
     */
    public function detail($id)
    {
        $data = BlogGroup::findOrFail($id);
        return view('admin.blog_group.detail', compact('data'));
    }
}
