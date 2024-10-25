<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateContactRequest;
use App\Models\Contact;
use App\Models\Service;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    /**
     * Chuyến đến trang liên hệ
     */
    public function index()
    {
        $list = Service::OfStatus(Service::STATUS_ACTIVE)->select('id', 'name')->get();
        return view('guest.contact.index', compact('list'));
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
