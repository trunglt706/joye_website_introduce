<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    /**
     * Chuyến đến trang danh sách bài viết
     */
    public function index() {
        return view('guest.blog.index');
    }

    /**
     * Chuyến đến trang chi tiết bài viết
     */
    public function detail($slug) {
        return view('guest.blog.detail');
    }
}
