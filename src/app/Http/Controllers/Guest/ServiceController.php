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
        $list = Service::OfStatus(Service::STATUS_ACTIVE)->select('id', 'slug', 'price', 'name', 'image', 'description')->paginate(8);
        return view('guest.service.index', compact('list'));
    }

    /**
     * Chuyến đến trang chi tiết dịch vụ
     */
    public function detail($slug)
    {
        $service = Service::ofStatus(Service::STATUS_ACTIVE)->ofSlug($slug)->firstOrFail();
        return view('guest.service.detail', compact('service'));
    }
}
