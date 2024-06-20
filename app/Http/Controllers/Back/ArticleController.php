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

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $article = Article::with('Category')->latest()->get();

            return DataTables::of($article)
                //custom column
                ->addIndexColumn() // untuk Id
                ->addColumn('category_id', function($article) {
                    return $article->Category->name;
                })
                ->addColumn('status', function($article) {
                    if ($article->status == 0) {
                        return '<span class="badge bg-danger">Private</span>';
                    } else {
                        return '<span class="badge bg-success">Published</span>';
                    }
                })
                ->addColumn('button', function($article) {
                    return '<div class="text-center">
                                    <a href="article/'.$article->id.'" class="btn btn-secondary">Detail</a>
                                    <a href="article/'.$article->id.'/edit" class="btn btn-primary">Edit</a>
                                    <a href="#" onclick="deleteArticle(this)" data-id="'.$article->id.'" class="btn btn-danger">Delete</a>
                    </div>';
                })
                //panggil custom column
                ->rawColumns(['category_id', 'status', 'button'])
                ->make();
        }

        return view('back.article.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.article.create', [
            'categories' => Category::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        $data = $request->validated();

        $file = $request->file('img'); //img
        $fileName = uniqid().'.'.$file->getClientOriginalExtension(); //jpg, jpeg
        $file->storeAs('public/back/', $fileName); //public/back/dqjwq1.jpg

        $data['img'] = $fileName;
        $data['slug'] = Str::slug($data['title']);

        Article::create($data);

        return redirect(url('article'))->with('success', 'Data Article created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Article::findOrFail($id);
        return view('back.article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('back.article.update', [
            'article' => Article::findOrFail($id),
            'categories' => Category::get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, string $id)
    {
        $data = $request->validated();

        if ($request->hasFile('img')) {
            $file = $request->file('img'); //img
            $fileName = uniqid().'.'.$file->getClientOriginalExtension(); //jpg, jpeg
            $file->storeAs('public/back/', $fileName); //public/back/dqjwq1.jpg

            //unlink img/delete old image
            Storage::delete('public/back/' .$request->oldImg);

            $data['img'] = $fileName;
        } else {
            $data['img'] = $request->oldImg;
        }

        $data['slug'] = Str::slug($data['title']);

        Article::findOrFail($id)->update($data);

        return redirect(url('article'))->with('success', 'Data Article updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Article::findOrFail($id);
        Storage::delete('public/back/' .$data->img);
        $data->delete();

        return response()->json([
           'message' => 'Data Article has been deleted'
        ]);
    }

    public function scanFile(Request $request)
    {
        $validated = $request->validate([
            'file' => 'required|file|max:4096',
        ]);

        $file = $request->file('file');
        $path = $file->store('uploads', 'public');

        $fullPath = storage_path('app/public/' . $path);

        $output = shell_exec("clamscan --stdout " . escapeshellarg($fullPath));

        if (strpos($output, 'OK') !== false) {
            return redirect()->back()->with('success', 'File uploaded and scanned successfully!');
        } else {
            Storage::disk('public')->delete($path);
            return redirect()->back()->with('error', 'File is infected and has been removed!');
        }
    }
}
?>

