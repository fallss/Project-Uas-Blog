<?php

namespace App\Http\Controllers\Front;

use App\Models\Article;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {        
        return view('front.home.index', [
            'latest_post' => Article::latest()->first(),
            'articles' => Article::with('Category')->whereStatus(1)->latest()->paginate(6),

        ]);
    }

    public function about()
    {
        return view('front.home.about');
    }
}