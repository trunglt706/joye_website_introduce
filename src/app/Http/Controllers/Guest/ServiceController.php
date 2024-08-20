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
        $list = Service::OfStatus(Service::STATUS_ACTIVE)->select('id', 'slug', 'name', 'image')->paginate(8);
        return view('guest.service.index', compact('list'));
    }

    /**
     * Chuyến đến trang chi tiết dịch vụ
     */
    public function detail($slug)
    {
        $service = Service::ofStatus(Service::STATUS_ACTIVE)->ofSlug($slug)->firstOrFail();
        $data = [
            'service' => $service,
            'other' => Service::ofStatus(Service::STATUS_ACTIVE)->where('id', '<>', $service->id)->select('id', 'slug', 'name', 'image', 'description')->limit(5)->get(),
        ];
        return view('guest.service.detail', compact('data'));
    }
}
