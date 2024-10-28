<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    protected $limit_default, $admin;

    public function __construct()
    {
        $this->limit_default = 10;
        $this->admin = auth('admin')->user();
    }

    /**
     * Trang chủ
     */
    public function index()
    {
        $data = [
            'blog' => Blog::count(),
            'service' => Service::count(),
            'admin' => Admin::count(),
            'contact' => Contact::count(),
        ];
        return view('admin.home.index', compact('data'));
    }

    /**
     * Chuyển đến trang upload editor
     */
    public function upload_editor()
    {
        return view('admin.editor');
    }

    /**
     * Đăng xuất tài khoản
     */
    public function logout()
    {
        Auth::guard('admin')->logout();
        Cache::flush();
        return redirect()->route('admin.index')->with('success', 'Đăng xuất thành công');
    }

    public function clear_cache()
    {
        Cache::flush();
        return redirect()->back()->with('success', 'Clear cache thành công');
    }
}
