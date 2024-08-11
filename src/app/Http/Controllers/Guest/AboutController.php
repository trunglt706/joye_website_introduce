<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    /**
     * Chuyến đến trang giới thiệu công ty
     */
    public function index() {
        return view('guest.about.index');
    }
}
