<?php

use App\Http\Controllers\Guest\AboutController;
use App\Http\Controllers\Guest\BlogController;
use App\Http\Controllers\Guest\ContactController;
use App\Http\Controllers\Guest\HomeController;
use App\Http\Controllers\Guest\ServiceController;
use Illuminate\Support\Facades\Route;

// trang chủ
Route::get('/', [HomeController::class, 'index'])->name('home');
// trang giới thiệu
Route::get('gioi-thieu', [AboutController::class, 'index'])->name('about');
// trang dịch vụ
Route::get('dich-vu', [ServiceController::class, 'index'])->name('service');
// trang bài viết
Route::get('bai-viet', [BlogController::class, 'index'])->name('blog');
Route::get('{slug}', [BlogController::class, 'detail'])->name('blog.detail');
// trang liên hệ
Route::get('lien-he', [ContactController::class, 'index'])->name('contact');
Route::post('lien-he', [ContactController::class, 'create'])->name('contact.create');
