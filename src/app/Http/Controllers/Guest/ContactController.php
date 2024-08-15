<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateContactRequest;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    /**
     * Chuyến đến trang liên hệ
     */
    public function index()
    {
        return view('guest.contact.index');
    }

    /**
     * Hàm lưu thông tin liên hệ
     */
    public function create(CreateContactRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = request()->only('name', 'phone', 'comment');
            Contact::create($data);
            DB::commit();
            return redirect()->back()->with('success', 'Gửi liên hệ thành công');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gửi liên hệ thất bại!');
        }
    }
}
