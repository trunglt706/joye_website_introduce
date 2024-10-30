<?php

namespace App\Http\Controllers\Guest2;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Partner;
use App\Models\Project;
use App\Models\Question;
use Illuminate\Support\Facades\Cache;

class HomeControllerV2 extends Controller
{
    /**
     * Chuyến đến trang chủ
     */
    public function index()
    {
        $partners = self::get_partners();
        $service_groups = get_service_groups();
        $projects = self::get_projects();
        $feedbacks = self::get_feedbacks();
        $fas = self::get_fas();
        return view('guest2.home.index', compact('partners', 'service_groups', 'projects', 'feedbacks', 'fas'));
    }

    public function get_partners()
    {
        $key = GUEST_PARTNER;
        if (Cache::has($key)) {
            $data = Cache::get($key);
        } else {
            $data = Cache::remember($key, CACHE_TIME, function () {
                return Partner::ofStatus(Partner::STATUS_ACTIVE)->select('name', 'image')->get();
            });
        }
        return $data;
    }

    public function get_projects()
    {
        $key = GUEST_PROJECT;
        if (Cache::has($key)) {
            $data = Cache::get($key);
        } else {
            $data = Cache::remember($key, CACHE_TIME, function () {
                return Project::join('service_groups', 'projects.group_id', '=', 'service_groups.id')->ofStatus(Project::STATUS_ACTIVE)
                    ->select('projects.name', 'projects.image', 'projects.description', 'projects.truy_cap', 'projects.doanh_thu', 'service_groups.name as group_name')->get();
            });
        }
        return $data;
    }

    public function get_feedbacks()
    {
        $key = GUEST_FEEDBACK;
        if (Cache::has($key)) {
            $data = Cache::get($key);
        } else {
            $data = Cache::remember($key, CACHE_TIME, function () {
                return Customer::ofStatus(Customer::STATUS_ACTIVE)->select('name', 'image', 'description', 'position')->get();
            });
        }
        return $data;
    }

    public function get_fas()
    {
        $key = GUEST_FAQ;
        if (Cache::has($key)) {
            $data = Cache::get($key);
        } else {
            $data = Cache::remember($key, CACHE_TIME, function () {
                return Question::ofStatus(Question::STATUS_ACTIVE)->select('name', 'description', 'id')->get();
            });
        }
        return $data;
    }
}
