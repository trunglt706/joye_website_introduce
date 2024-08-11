<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    /**
     * Chuyến đến trang dịch vụ
     */
    public function index() {
        return view('guest.service.index');
    }

    /**
     * Chuyến đến trang chi tiết dịch vụ
     */
    public function detail($slug) {
        return view('guest.service.detail');
    }
}
