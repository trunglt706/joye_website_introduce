<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactController extends Controller
{
    protected $limit_default, $admin;

    public function __construct()
    {
        $this->limit_default = 10;
        $this->admin = auth('admin')->user();
    }

    /**
     * Trang quản lý liên hệ
     */
    public function index()
    {
        $data = [
            'status' => Contact::get_status(),
        ];
        return view('admin.contact.index', compact('data'));
    }

    /**
     * Danh sách liên hệ
     */
    public function table()
    {
        $limit = request('limit', $this->limit_default);
        $search = request('search', '');
        $status = request('status', '');

        $list = Contact::query();
        $list = $search != '' ? $list->search($search) : $list;
        $list = $status != '' ? $list->ofStatus($status) : $list;
        $list = $list->latest()->paginate($limit);

        return response()->json([
            'status' => 200,
            'data' => view('admin.contact.table', compact('list'))->render()
        ]);
    }

    /**
     * Chi tiết liên hệ
     */
    public function detail($id)
    {
        $data = Contact::findOrFail($id);
        return view('admin.contact.detail', compact('data'));
    }

    /**
     * Cập nhật trạng thái liên hệ
     */
    public function update($id)
    {
        try {
            $status = request('status', '');
            $data = Contact::ofStatus(Contact::STATUS_UN_ACTIVE)->findOrFail($id);
            $data->status = $status;
            $data->save();
            $text = $status = Contact::STATUS_ACTIVE ? 'được xử lý' : 'bị từ chối';
            admin_save_log("Liên hệ #$data->code vừa mới $text", route("admin.contact.detail", ['id' => $data->id]), $this->admin->id);
            return redirect()->back()->with('success', 'Cập nhật thành công');
        } catch (\Throwable $th) {
            showLog($th);
            return redirect()->back()->with('error', 'Cập nhật thất bại!');
        }
    }
}
