<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;


class ArticlesController extends Controller
{
    public function index(Request $request)
    {
        if(!empty($request->records_per_page)){
            $request -> records_per_page = $request -> records_per_page <= env('PAGINATION_MAX_SIZE') ? $request -> records_per_page : env('PAGINATION_MAX_SIZE');
        }else{
            $request -> records_per_page = env('PAGINATION_DEFAULT_SIZE');
        }

        $articles = Article::with('blog')->where('title','LIKE',"%$request->filter%")
                                         ->paginate($request->records_per_page);

        return view('articles.index', ['articles'=>$articles, 'data'=>$request]);
    }

    public function create(){
        $blogs = Blog::all();
        return view('articles.create', ['blogs'=>$blogs]);
    }

    public function store(Request $request ){
        try{
            $article = new Article();
            $article->title = $request->title;
            $article->content = $request->content;
            $article->date = now();
            $article->blog_id = $request->blog_id;

            $article->save();

            return redirect()->action([ArticlesController::class, 'index']);
        }catch(Exception $ex){
            Log::error($ex);
        }
    }

    public function edit($id){

        $blogs = Blog::all();
        $article = Article::find($id);

        if(empty($article)){
            abort(404, "El articulo con id '$id' no existe");
        }
        return view('articles.edit', ['article' => $article , 'blogs'=> $blogs]);
    }


    public function update(Request $request ){
        try{
            $article = Article::find($request->article_id);

            if(empty($article)){
                abort(404, "El articulo con id '$request' no existe");
            }

            $article->title = $request->title;
            $article->content = $request->content;
            $article->blog_id = $request->blog_id;

            $article->save();

            return redirect()->action([ArticlesController::class, 'index']);
        }catch(Exception $ex){
            Log::error($ex);
        }
    }


    public function delete($id){

        $article = Article::find($id);

        if(empty($article)){
            abort(404, "El articulo con id '$id' no existe");
        }

        $article->delete();

        return redirect()->action([ArticlesController::class, 'index']);
    }

}
