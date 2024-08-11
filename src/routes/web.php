<?php

use App\Http\Controllers\Guest\AboutController;
use App\Http\Controllers\Guest\BlogController;
use App\Http\Controllers\Guest\ContactController;
use App\Http\Controllers\Guest\FaqController;
use App\Http\Controllers\Guest\HomeController;
use App\Http\Controllers\Guest\ServiceController;
use Illuminate\Support\Facades\Route;

// trang chủ
Route::get('/', [HomeController::class, 'index'])->name('home');
// trang giới thiệu
Route::get('gioi-thieu', [AboutController::class, 'index'])->name('about');
// trang dịch vụ
Route::get('dich-vu', [ServiceController::class, 'index'])->name('service');
Route::get('dich-vu/{slug}', [ServiceController::class, 'detail'])->name('service');
// trang câu hỏi thường gặp
Route::get('faq', [FaqController::class, 'index'])->name('faq');
// trang liên hệ
Route::get('lien-he', [ContactController::class, 'index'])->name('contact');
Route::post('lien-he', [ContactController::class, 'create'])->name('contact.create');
// trang bài viết
Route::get('tin-tuc', [BlogController::class, 'index'])->name('blog');
Route::get('tin-tuc/{slug}', [BlogController::class, 'detail'])->name('blog.detail');
