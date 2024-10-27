<?php

namespace App\Http\Controllers\Guest2;

use App\Http\Controllers\Controller;

class HomeControllerV2 extends Controller
{
    /**
     * Chuyến đến trang chủ
     */
    public function index()
    {
        return view('guest2.home.index');
    }
}
