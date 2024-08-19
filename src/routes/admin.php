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
use App\Http\Controllers\Admin\SocialController;
use Illuminate\Support\Facades\Route;

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'login_post'])->name('login_post');

Route::name('admin.')->prefix('admin')->group(function () {
    Route::middleware(['checkAdmin'])->group(function () {
        Route::get('', [HomeController::class, 'index'])->name('index');
        Route::get('doupload', [HomeController::class, 'upload_editor'])->name('upload_editor');
        Route::get('logout', [HomeController::class, 'logout'])->name('logout');
        Route::name('log_action.')->prefix('log_action')->group(function () {
            Route::get('', [LogActionController::class, 'index'])->name('index');
            Route::get('table', [LogActionController::class, 'table'])->name('table');
            Route::get('/{id}', [LogActionController::class, 'detail'])->name('detail');
        });
        Route::name('admin.')->prefix('admin')->group(function () {
            Route::get('', [AdminController::class, 'index'])->name('index');
            Route::get('table', [AdminController::class, 'table'])->name('table');
            Route::get('destroy', [AdminController::class, 'destroy'])->name('destroy');
            Route::get('/{id}', [AdminController::class, 'detail'])->name('detail');
            Route::post('create', [AdminController::class, 'create'])->name('create');
            Route::post('update', [AdminController::class, 'update'])->name('update');
            Route::post('update_account', [AdminController::class, 'update_account'])->name('update_account');
        });
        Route::name('blog.')->prefix('blog')->group(function () {
            Route::get('', [BlogController::class, 'index'])->name('index');
            Route::get('table', [BlogController::class, 'table'])->name('table');
            Route::get('destroy', [BlogController::class, 'destroy'])->name('destroy');
            Route::get('/{id}', [BlogController::class, 'detail'])->name('detail');
            Route::post('create', [BlogController::class, 'create'])->name('create');
            Route::post('update', [BlogController::class, 'update'])->name('update');
        });
        Route::name('blog_group.')->prefix('blog_group')->group(function () {
            Route::get('', [BlogGroupController::class, 'index'])->name('index');
            Route::get('table', [BlogGroupController::class, 'table'])->name('table');
            Route::get('destroy', [BlogGroupController::class, 'destroy'])->name('destroy');
            Route::get('/{id}', [BlogGroupController::class, 'detail'])->name('detail');
            Route::post('create', [BlogGroupController::class, 'create'])->name('create');
            Route::post('update', [BlogGroupController::class, 'update'])->name('update');
        });
        Route::name('service.')->prefix('service')->group(function () {
            Route::get('', [ServiceController::class, 'index'])->name('index');
            Route::get('table', [ServiceController::class, 'table'])->name('table');
            Route::get('destroy', [ServiceController::class, 'destroy'])->name('destroy');
            Route::get('/{id}', [ServiceController::class, 'detail'])->name('detail');
            Route::post('create', [ServiceController::class, 'create'])->name('create');
            Route::post('update', [ServiceController::class, 'update'])->name('update');
        });
        Route::name('contact.')->prefix('contact')->group(function () {
            Route::get('', [ContactController::class, 'index'])->name('index');
            Route::get('table', [ContactController::class, 'table'])->name('table');
            Route::get('/{id}', [ContactController::class, 'detail'])->name('detail');
            Route::get('update/{id}', [ContactController::class, 'update'])->name('update');
        });
        Route::name('faq.')->prefix('faq')->group(function () {
            Route::get('', [QuestionController::class, 'index'])->name('index');
            Route::get('table', [QuestionController::class, 'table'])->name('table');
            Route::get('destroy', [QuestionController::class, 'destroy'])->name('destroy');
            Route::get('/{id}', [QuestionController::class, 'detail'])->name('detail');
            Route::post('create', [QuestionController::class, 'create'])->name('create');
            Route::post('update', [QuestionController::class, 'update'])->name('update');
        });
        Route::name('setting.')->prefix('setting')->group(function () {
            Route::get('', [SettingController::class, 'index'])->name('index');
            Route::post('update', [SettingController::class, 'update'])->name('update');
        });
        Route::name('social.')->prefix('social')->group(function () {
            Route::get('', [SocialController::class, 'index'])->name('index');
            Route::get('table', [SocialController::class, 'table'])->name('table');
            Route::get('destroy', [SocialController::class, 'destroy'])->name('destroy');
            Route::get('/{id}', [SocialController::class, 'detail'])->name('detail');
            Route::post('create', [SocialController::class, 'create'])->name('create');
            Route::post('update', [SocialController::class, 'update'])->name('update');
        });
    });
});
