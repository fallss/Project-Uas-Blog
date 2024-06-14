<?php
namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::All();
        return view('articles.index', ['articles' => $articles]);
    }
    public function create(){
        return view('articles.create');
    }

    public function store(Request $req)
    {
        $req->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        return redirect()->route('tech.index')->with('success', 'New Blog Successfully Added');
    }
    
}
