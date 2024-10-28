<?php

namespace App\Http\Controllers\Guest2;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateContactRequest;
use App\Models\Contact;
use App\Models\Question;
use App\Models\Service;
use App\Models\ServiceGroup;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ContactControllerV2 extends Controller
{
    /**
     * Chuyến đến trang liên hệ
     */
    public function index()
    {
        $groups = self::get_service_groups();
        $fas = self::get_fas();
        return view('guest2.contact.index', compact('groups', 'fas'));
    }

    public function get_service_groups()
    {
        $key = GUEST_SERVICE_GROUP;
        if (Cache::has($key)) {
            $data = Cache::get($key);
        } else {
            $data = Cache::remember($key, CACHE_TIME, function () {
                return ServiceGroup::ofStatus(ServiceGroup::STATUS_ACTIVE)->select('id', 'name')->get();
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

    /**
     * Hàm lưu thông tin liên hệ
     */
    public function create(CreateContactRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = request()->only('name', 'phone', 'email', 'comment');
            $requestCount = session()->get('contact_request_count', 0);
            if ($requestCount >= 1) {
                return redirect()->back()->with('error', 'Rất tiết, bạn đã vượt quá số lượng gửi yêu cầu trong ngày!');
            }
            if (request('service_id', '') != '') {
                $service = Service::find(request('service_id', ''));
                $data['service'] = $service->name;
            }
            Contact::create($data);
            DB::commit();
            session()->put('contact_request_count', $requestCount + 1);
            return redirect()->back()->with('success', 'Gửi liên hệ thành công');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gửi liên hệ thất bại!');
        }
    }
}
