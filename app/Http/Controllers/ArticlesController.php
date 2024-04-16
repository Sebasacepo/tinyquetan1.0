<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index()
    {

        $articles = Article::all();

        return view('articles.index', ['articles'=>$articles]);
    }

    public function create(){
        return view('articles.create');
    }

    public function store(Request $request ){
        try{
            $article = new Article();
            $article->title = $request->title;
            $article->content = $request->content;
            $article->date = now();

            $article->save();

            return redirect()->action([ArticlesController::class, 'index']);
        }catch(Exception $ex){
            Logg::error($ex);
        }
    }

    public function edit($id){

        $article = Article::find($id);

        if(empty($article)){
            abort(404, "El articulo con id '$id' no existe");
        }
        return view('articles.edit', ['article' => $article]);
    }


    public function update(Request $request ){
        try{
            $article = Article::find($request->article_id);

            if(empty($article)){
                abort(404, "El articulo con id '$request' no existe");
            }

            $article->title = $request->title;
            $article->content = $request->content;

            $article->save();

            return redirect()->action([ArticlesController::class, 'index']);
        }catch(Exception $ex){
            Logg::error($ex);
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
