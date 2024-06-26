<?php

namespace App\Http\Controllers\Front;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('front.home.index', [
            'latest_post' => Article::latest()->first(),
            'articles' => Article::latest()->get(),
            'categories' => Category::latest()->get(),
        ]);
    }
}