<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogGroup;

class BlogController extends Controller
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
            'status' => Blog::get_status(),
            'group' => BlogGroup::ofStatus(BlogGroup::STATUS_ACTIVE)->select('id', 'name')->get(),
        ];
        return view('admin.blog.index', compact('data'));
    }

    /**
     * Danh sách bài viết
     */
    public function table()
    {
        $limit = request('limit', $this->limit_default);
        $search = request('search', '');
        $status = request('status', '');
        $group_id = request('group_id', '');

        $list = Blog::query();
        $list = $search != '' ? $list->search($search) : $list;
        $list = $status != '' ? $list->ofStatus($status) : $list;
        $list = $group_id != '' ? $list->groupId($group_id) : $list;
        $list = $list->latest()->paginate($limit);

        return response()->json([
            'status' => 200,
            'data' => view('admin.blog.table', compact('list'))->render()
        ]);
    }

    /**
     * Chi tiết bài viết
     */
    public function detail($id)
    {
        $data = [
            'blog' => Blog::findOrFail($id),
            'group' => BlogGroup::ofStatus(BlogGroup::STATUS_ACTIVE)->select('id', 'name')->get(),
        ];
        return view('admin.blog.detail', compact('data'));
    }
}
