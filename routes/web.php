<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/admin/news', NewsController::class)->names('admin-news');
Route::resource('/admin/services', ServicesController::class)->names('admin-services');
Route::resource('/admin/gallery', GalleryController::class)->names('admin-gallery');
Route::resource('/admin/inbox', InboxController::class)->names('admin-inbox');
