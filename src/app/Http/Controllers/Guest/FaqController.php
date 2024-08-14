<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Question;

class FaqController extends Controller
{
    /**
     * Chuyến đến trang câu hỏi thường gặp
     */
    public function index()
    {
        $data = Question::ofStatus(Question::STATUS_ACTIVE)->latest()->select('id', 'name', 'description')->get();
        return view('guest.faq.index', compact('data'));
    }
}
