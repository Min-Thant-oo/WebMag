<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BlogStatusController;
use App\Http\Controllers\SiteConfigController;
use App\Http\Controllers\ContactMessageController;

Route::name('blog.')->group(function() {
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/blogs', [HomeController::class, 'blogs'])->name('blogs');
    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
    Route::post('/contact', [HomeController::class, 'store_contact_message'])->name('store_contact_message');
    Route::get('/about', [HomeController::class, 'about'])->name('about');
    Route::get('/policy', [HomeController::class, 'policy'])->name('policy');
    Route::get('/blog/{slug}', [HomeController::class, 'blog_view'])->name('blog_view');
    Route::post('/blog/{slug}', [HomeController::class, 'store_comment'])->name('store_comment');
});


Route::get('login', [AdminController::class, 'login'])->name('admin.login');
Route::post('login', [AdminController::class, 'post_login'])->name('admin.post_login');
Route::post('logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::name('admin.')->middleware(['web', 'auth'])->prefix('admin/')->group(function() {
    Route::get('', [AdminController::class, 'index'])->name('index');
    Route::resource('blog', BlogController::class)->except('show');
    Route::resource('category', CategoryController::class)->except('show');
    Route::resource('status', BlogStatusController::class)->except('show');
    Route::resource('comment', CommentController::class)->except('show');
    Route::resource('siteconfig', SiteConfigController::class)->except('index', 'show', 'store', 'create');
    Route::resource('contactmessage', ContactMessageController::class)->except('edit', 'update', 'store', 'create');
});