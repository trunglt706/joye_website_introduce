<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class checkAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth('admin')->check()) {
            $admin = Admin::find(auth('admin')->user()->id);
            if ($admin && $admin->status == Admin::STATUS_ACTIVE) {
                return $next($request);
            }
            auth('admin')->logout();
        }
        return redirect()->route('admin.login');
    }
}
