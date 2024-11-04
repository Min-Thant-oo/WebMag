<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BlogStatusController;
use App\Http\Controllers\Admin\BlogCommentController;
use App\Http\Controllers\SiteConfigController;
use App\Http\Controllers\ContactMessageController;

Route::middleware('guest')->group(function () {
    Route::get('login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('login', [AdminController::class, 'post_login'])->name('admin.post_login');
});

Route::name('admin.')->prefix('admin')->middleware(['web', 'auth'])->group(function () {
    Route::get('', [AdminController::class, 'index'])->name('index');
    Route::post('logout', [AdminController::class, 'logout'])->name('logout');
    Route::resource('blog', BlogController::class)->except('show');
    Route::resource('comment', BlogCommentController::class)->except('show');
    Route::resource('category', CategoryController::class)->except('show');
    Route::resource('status', BlogStatusController::class)->except('show');
    Route::resource('contactmessage', ContactMessageController::class)->only('index', 'show');
    Route::resource('siteconfig', SiteConfigController::class)->only('edit', 'update');
});
