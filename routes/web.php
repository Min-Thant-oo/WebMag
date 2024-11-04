<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
