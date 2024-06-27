<?php

namespace App\Http\Controllers\Back;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\UpdateArticleRequest;
use Illuminate\Support\Facades\Http;

class ArticleController extends Controller
{

    public function index()
    {
        if (request()->ajax()) {
            $articles = Article::with('category')->latest()->get();

            return DataTables::of($articles)
                ->addIndexColumn()
                ->addColumn('category_id', function ($article) {
                    return $article->category->name;
                })
                ->addColumn('status', function ($article) {
                    return $article->status == 0 ? '<span class="badge bg-danger">Private</span>' : '<span class="badge bg-success">Published</span>';
                })
                ->addColumn('button', function ($article) {
                    return '<div class="text-center">
                        <a href="' . route('article.show', $article->id) . '" class="btn btn-secondary">Detail</a>
                        <a href="' . route('article.edit', $article->id) . '" class="btn btn-primary">Edit</a>
                        <button class="btn btn-danger" onclick="deleteArticle(' . $article->id . ')">Delete</button>
                    </div>';
                })
                ->rawColumns(['category_id', 'status', 'button'])
                ->make(true);
        }

        return view('back.article.index');
    }

    public function create()
    {
        return view('back.article.create', [
            'categories' => Category::get(),
        ]);
    }

    public function store(ArticleRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $fileName = uniqid().'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/back/', $fileName);
            $data['img'] = $fileName;
        }

        $data['slug'] = Str::slug($data['title']);

        Article::create($data);

        return redirect()->route('article.index')->with('success', 'Article created successfully');
    }


    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('back.article.show', compact('article'));
    }

    public function edit($id)
    {
        return view('back.article.edit', [
            'article' => Article::findOrFail($id),
            'categories' => Category::get(),
        ]);
    }

    public function update(UpdateArticleRequest $request, $id)
    {
        $data = $request->validated();

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $fileName = uniqid().'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/back/', $fileName);
            $data['img'] = $fileName;

            Storage::delete('public/back/' . $request->oldImg);
        } else {
            $data['img'] = $request->oldImg;
        }

        $data['slug'] = Str::slug($data['title']);

        Article::findOrFail($id)->update($data);

        return redirect()->route('article.index')->with('success', 'Article updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        Storage::delete('public/back/' . $article->img);
        $article->delete();

        return response()->json(['message' => 'Article deleted successfully']);
    }

}
