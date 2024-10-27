<?php

namespace App\Http\Controllers\Guest2;

use App\Http\Controllers\Controller;

class AboutControllerV2 extends Controller
{
    /**
     * Chuyến đến trang giới thiệu công ty
     */
    public function index() {
        return view('guest2.about.index');
    }
}
