<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    /**
     * Chuyến đến trang liên hệ
     */
    public function index() {
        return view('guest.contact.index');
    }

    /**
     * Hàm lưu thông tin liên hệ
     */
    public function create() {}
}
