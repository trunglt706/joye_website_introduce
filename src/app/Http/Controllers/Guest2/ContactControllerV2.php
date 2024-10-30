<?php

namespace App\Http\Controllers\Guest2;

use App\Http\Controllers\Controller;
use App\Http\Requests\InsertContactRequest;
use App\Models\Contact;
use App\Models\Question;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ContactControllerV2 extends Controller
{
    /**
     * Chuyến đến trang liên hệ
     */
    public function index()
    {
        $groups = get_service_groups();
        $fas = self::get_fas();
        return view('guest2.contact.index', compact('groups', 'fas'));
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
    public function create(InsertContactRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = request()->all();
            $requestCount = session()->get('contact_request_count', 0);
            if ($requestCount >= 3) {
                return response()->json([
                    'status' => 500,
                    'message' => 'Rất tiết, bạn đã vượt quá số lượng gửi yêu cầu trong ngày!'
                ]);
            }
            Contact::create($data);
            DB::commit();
            session()->put('contact_request_count', $requestCount + 1);
            return response()->json([
                'status' => 200,
                'message' => 'Gửi liên hệ thành công',
                'data' => view('guest2.general.success')->render(),
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'status' => 500,
                'message' => 'Gửi liên hệ thất bại!'
            ]);
        }
    }
}
