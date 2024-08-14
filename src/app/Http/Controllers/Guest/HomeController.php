<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Service;

class HomeController extends Controller
{
    /**
     * Chuyến đến trang chủ
     */
    public function index()
    {
        $data = [
            'blog' => Blog::ofStatus(Blog::STATUS_ACTIVE)->latest()->select('id', 'name', 'image', 'created_at')->limit(6)->get(),
            'service' => Service::ofStatus(Service::STATUS_ACTIVE)->latest()->select('id', 'name', 'image', 'description')->limit(6)->get()
        ];
        return view('guest.home.index', compact('data'));
    }
}
