<?php

namespace App\Http\Controllers\Guest2;

use App\Http\Controllers\Controller;
use App\Models\Blog;

class BlogControllerV2 extends Controller
{
    /**
     * Chuyến đến trang danh sách bài viết
     * Hiển thị danh sách danh mục bài viết mới nhất
     * Hiển thị danh sách bài viết mới nhất
     */
    public function index()
    {
        return view('guest2.blog.index');
    }

    /**
     * Chuyến đến trang chi tiết bài viết
     * Hiển thị thêm 5 bài viết liên quan, cùng danh mục
     */
    public function detail($slug)
    {
        return view('guest2.blog.detail');
    }
}
