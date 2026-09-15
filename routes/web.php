<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\InboxController;
use App\Http\Models\News;
use App\Http\Models\Inbox;
use App\Http\Models\Gallery;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::resource('/admin/news', NewsController::class)->names('admin-news');
    Route::resource('/admin/gallery', GalleryController::class)->names('admin-gallery');
    Route::resource('/admin/inbox', InboxController::class)->names('admin-inbox');
});

require __DIR__.'/auth.php';




