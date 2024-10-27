<?php

namespace App\Http\Controllers\Guest2;

use App\Http\Controllers\Controller;
use App\Models\Service;

class ServiceControllerV2 extends Controller
{
    /**
     * Chuyến đến trang dịch vụ
     */
    public function index()
    {
        return view('guest2.service.index');
    }

    /**
     * Chuyến đến trang chi tiết dịch vụ
     */
    public function detail($slug)
    {
        return view('guest2.service.detail');
    }
}
