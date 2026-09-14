<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\ServicesController;
use App\Http\Models\News;
use App\Http\Models\Inbox;
use App\Http\Models\Services;
use App\Http\Models\Gallery;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('welcome');
})->name('admin');

Route::resource('/admin/news', NewsController::class)->names('admin-news');
Route::resource('/admin/services', ServicesController::class)->names('admin-services');
Route::resource('/admin/gallery', GalleryController::class)->names('admin-gallery');
Route::resource('/admin/inbox', InboxController::class)->names('admin-inbox');
