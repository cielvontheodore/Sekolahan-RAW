<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\InboxController;
use App\Http\Models\News;
use App\Http\Models\Inbox;
use App\Http\Models\Gallery;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AiController;


// welcome index basically
Route::get('/', [HomeController::class, 'index']);

// gallery ----------------------------------------------------
Route::get('/gallery', [HomeController::class, 'gallery'])
    ->name('gallery');

Route::get('/gallery/{gallery}', [HomeController::class, 'galleryShow'])
    ->name('gallery.show');
// ----------------------------------------------------

// news ----------------------------------------------------
Route::get('/news', [HomeController::class, 'news'])
    ->name('news');

Route::get('/news/{news}', [HomeController::class, 'newsShow'])
    ->name('news.show');
// ----------------------------------------------------

// chatbot min
Route::post('/ai/chat', [AiController::class, 'chat']);

// rate limiting native laravel + contact store with cloudflare captcha
Route::post('/contact', [InboxController::class, 'storepublic'])
    ->middleware('throttle:10,1')
    ->name('contact.store');

// admin dashboard auth middleware
Route::get('/admin', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//middleware
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/admin/news', NewsController::class)->names('admin-news');
    Route::resource('/admin/gallery', GalleryController::class)->names('admin-gallery');
    Route::resource('/admin/inbox', InboxController::class)->names('admin-inbox');
});

// super admin crud to manage admins
Route::middleware(['auth', 'can:manage-admins'])->group(function () {
    Route::resource('/admin/admins', AdminController::class)
        ->names('admin-admins')
        ->except(['show']);
});

require __DIR__.'/auth.php';


// todo
// rapihin ui admin
// whatsapp integration
// ai integration
// seo
// ui baru
// ppdb
