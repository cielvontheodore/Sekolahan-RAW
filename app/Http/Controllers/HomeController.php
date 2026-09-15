<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\News;

class HomeController extends Controller
{
    public function index() {
        
        $news = News::latest()->take(3)->get();
        $gallery = Gallery::latest()->take(3)->get();
    
        return view('welcome', compact('news', 'gallery'));
    }
}
