<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Support\Facades\Cache;

class FaqController extends Controller
{
    /**
     * Chuyến đến trang câu hỏi thường gặp
     */
    public function index()
    {
        $key = 'guest-faq';
        if (Cache::has($key)) {
            $data = Cache::get($key);
        } else {
            $data = Cache::remember($key, CACHE_TIME, function () {
                return Question::ofStatus(Question::STATUS_ACTIVE)->latest()->select('id', 'name', 'description')->get();
            });
        }
        return view('guest.faq.index', compact('data'));
    }
}
