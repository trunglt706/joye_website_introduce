<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Trang đăng nhập
     */
    public function login()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.index');
        }
        return view('admin.auth.login');
    }

    /**
     * Hành động xác thực đăng nhập
     */
    public function login_post()
    {
        try {
            DB::beginTransaction();
            $data = request()->all();
            $admin = Admin::ofEmail($data['email'])->first();
            if ($admin && Hash::check($data['password'], $admin->password)) {
                $admin->last_login = now();
                $admin->save();
                admin_save_log("Đăng nhập vào hệ thống", route("admin.admin.detail", ['id' => $admin->id]), $admin->id);

                Auth::guard('admin')->login($admin);
                DB::commit();
                return redirect()->route('admin.index')->with('success', 'Đăng nhập thành công');
            } else {
                DB::rollBack();
            }
        } catch (\Throwable $th) {
            showLog($th);
            DB::rollBack();
        }
        return redirect()->back()->with('error', 'Đăng nhập thất bại!');
    }
}
