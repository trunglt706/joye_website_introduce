<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Service;

class ServiceController extends Controller
{
    /**
     * Chuyến đến trang dịch vụ
     */
    public function index()
    {
        $list = Service::paginate(8);
        return view('guest.service.index', compact('list'));
    }

    /**
     * Chuyến đến trang chi tiết dịch vụ
     */
    public function detail($slug)
    {
        return view('guest.service.detail');
    }
}
