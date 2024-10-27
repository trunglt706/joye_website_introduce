<?php

use App\Http\Controllers\Guest2\HomeControllerV2;
use App\Http\Controllers\Guest2\AboutControllerV2;
use App\Http\Controllers\Guest2\BlogControllerV2;
use App\Http\Controllers\Guest2\ContactControllerV2;
use App\Http\Controllers\Guest2\ServiceControllerV2;
use Illuminate\Support\Facades\Route;

Route::prefix('v2')->name('v2.')->group(function () {
    Route::get('', [HomeControllerV2::class, 'index'])->name('home');
    Route::get('gioi-thieu', [AboutControllerV2::class, 'index'])->name('about');
    Route::get('dich-vu', [ServiceControllerV2::class, 'index'])->name('service');
    Route::get('dich-vu/{slug}', [ServiceControllerV2::class, 'detail'])->name('service.detail');
    Route::get('tin-tuc', [BlogControllerV2::class, 'index'])->name('blog');
    Route::get('tin-tuc/{slug}', [BlogControllerV2::class, 'detail'])->name('blog.detail');
    Route::get('lien-he', [ContactControllerV2::class, 'index'])->name('contact');
});
