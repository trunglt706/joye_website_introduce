<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;

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
}
