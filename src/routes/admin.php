<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BlogGroupController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LogActionController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Middleware\checkAdmin;
use Illuminate\Support\Facades\Route;

Route::name('admin.')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'login_post'])->name('login_post');

    Route::middleware([checkAdmin::class])->group(function () {
        Route::get('', [HomeController::class, 'index'])->name('index');
        Route::get('logout', [HomeController::class, 'logout'])->name('logout');
        Route::name('log_action.')->prefix('log_action')->group(function () {
            Route::get('', [LogActionController::class, 'index'])->name('index');
            Route::get('table', [LogActionController::class, 'table'])->name('table');
            Route::get('/{id}', [LogActionController::class, 'detail'])->name('detail');
        });
        Route::name('admin.')->prefix('admin')->group(function () {
            Route::get('', [AdminController::class, 'index'])->name('index');
            Route::get('table', [AdminController::class, 'table'])->name('table');
            Route::get('/{id}', [AdminController::class, 'detail'])->name('detail');
            Route::post('create', [AdminController::class, 'create'])->name('create');
            Route::post('update', [AdminController::class, 'update'])->name('update');
            Route::post('update_account', [AdminController::class, 'update_account'])->name('update_account');
        });
        Route::name('blog.')->prefix('blog')->group(function () {
            Route::get('', [BlogController::class, 'index'])->name('index');
            Route::get('table', [BlogController::class, 'table'])->name('table');
            Route::get('/{id}', [BlogController::class, 'detail'])->name('detail');
        });
        Route::name('blog_group.')->prefix('blog_group')->group(function () {
            Route::get('', [BlogGroupController::class, 'index'])->name('index');
            Route::get('table', [BlogGroupController::class, 'table'])->name('table');
            Route::get('/{id}', [BlogGroupController::class, 'detail'])->name('detail');
        });
        Route::name('service.')->prefix('service')->group(function () {
            Route::get('', [ServiceController::class, 'index'])->name('index');
            Route::get('table', [ServiceController::class, 'table'])->name('table');
            Route::get('/{id}', [ServiceController::class, 'detail'])->name('detail');
        });
        Route::name('contact.')->prefix('contact')->group(function () {
            Route::get('', [ContactController::class, 'index'])->name('index');
            Route::get('table', [ContactController::class, 'table'])->name('table');
            Route::get('/{id}', [ContactController::class, 'detail'])->name('detail');
        });
        Route::name('faq.')->prefix('faq')->group(function () {
            Route::get('', [QuestionController::class, 'index'])->name('index');
            Route::get('table', [QuestionController::class, 'table'])->name('table');
            Route::get('/{id}', [QuestionController::class, 'detail'])->name('detail');
        });
        Route::name('setting.')->prefix('setting')->group(function () {
            Route::get('', [SettingController::class, 'index'])->name('index');
            Route::post('update', [SettingController::class, 'update'])->name('update');
        });
    });
});
