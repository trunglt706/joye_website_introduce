<?php

namespace App\Http\Controllers\Guest2;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceGroup;
use Illuminate\Support\Facades\Cache;

class ServiceControllerV2 extends Controller
{
    /**
     * Chuyến đến trang dịch vụ
     */
    public function index()
    {
        $g = request('g', '');
        $list = Service::join('service_groups', 'services.group_id', '=', 'service_groups.id')->ofStatus(Service::STATUS_ACTIVE);
        $list = $g != '' ? $list->where('service_groups.slug', $g) : $list;
        $list = $list->select('services.slug', 'services.name', 'services.image', 'services.description', 'service_groups.name as group_name')
            ->latest('services.created_at')->paginate(6);
        $groups = self::get_service_groups();
        return view('guest2.service.index', compact('groups', 'list'));
    }

    public function get_service_groups()
    {
        $key = GUEST_SERVICE_GROUP;
        if (Cache::has($key)) {
            $data = Cache::get($key);
        } else {
            $data = Cache::remember($key, CACHE_TIME, function () {
                return ServiceGroup::ofStatus(ServiceGroup::STATUS_ACTIVE)->select('slug', 'name', 'image', 'icon', 'description')->get();
            });
        }
        return $data;
    }

    /**
     * Chuyến đến trang chi tiết dịch vụ
     */
    public function detail($slug)
    {
        $data = Service::ofSlug($slug)->ofStatus(Service::STATUS_ACTIVE)->firstOrFail();
        $list = Service::join('service_groups', 'services.group_id', '=', 'service_groups.id')->ofStatus(Service::STATUS_ACTIVE)
            ->where('services.id', '<>', $data->id)->select('services.slug', 'services.name', 'services.image', 'services.description', 'service_groups.name as group_name')
            ->latest('services.created_at')->limit(3)->get();
        return view('guest2.service.detail', compact('data', 'list'));
    }
}
