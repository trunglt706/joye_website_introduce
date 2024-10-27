<?php

use App\Http\Controllers\Guest2\HomeControllerV2;
use App\Http\Controllers\Guest2\AboutControllerV2;
use App\Http\Controllers\Guest2\BlogControllerV2;
use App\Http\Controllers\Guest2\ContactControllerV2;
use App\Http\Controllers\Guest2\FaqController;
use App\Http\Controllers\Guest2\ServiceControllerV2;
use Illuminate\Support\Facades\Route;

Route::get('v2/', [HomeControllerV2::class, 'index'])->name('v2.home');
Route::get('v2/gioi-thieu', [AboutControllerV2::class, 'index'])->name('v2.about');
Route::get('v2/dich-vu', [ServiceControllerV2::class, 'index'])->name('v2.service');
Route::get('v2/dich-vu/{slug}', [ServiceControllerV2::class, 'detail'])->name('v2.service.detail');
Route::get('v2/tin-tuc', [BlogControllerV2::class, 'index'])->name('v2.blog');
Route::get('v2/tin-tuc/{slug}', [BlogControllerV2::class, 'detail'])->name('v2.blog.detail');
Route::get('v2/lien-he', [ContactControllerV2::class, 'index'])->name('contact');
