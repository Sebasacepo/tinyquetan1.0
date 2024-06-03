<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comments;
use App\Models\Article;
use Illuminate\Support\Facades\Log;
use Exception;
class CommentsController extends Controller
{
    public function index(Request $request)
    {
        if(!empty($request->records_per_page)){
            $request -> records_per_page = $request -> records_per_page <= env('PAGINATION_MAX_SIZE') ? $request -> records_per_page : env('PAGINATION_MAX_SIZE');
        }else{
            $request -> records_per_page = env('PAGINATION_DEFAULT_SIZE');
        }

        $comment = Comments::with('article')
                                            ->where('comment_content','LIKE',"%$request->filter%")
                                            ->paginate($request->records_per_page);

        return view('comments.index', ['comments'=>$comment, 'data'=>$request]);
    }

    public function create(){
        $articles = Article::all();
        return view('comments.create', ['articles'=>$articles]);
    }

    public function store(Request $request ){
        try{
            $comment = new Comments();
            $comment->article_id = $request->article_id;
            $comment->comment_content = $request->comment_content;
            $comment->date = now();

            $comment->save();

            return redirect()->action([CommentsController::class, 'index']);
        }catch(Exception $ex){
            Log::error($ex);
        }
    }


    public function edit($id){
        $comment = Comments::find($id);
        $articles = Article::all();

        if(empty($comment)){
            abort(404, "El comentario con id '$id' no existe");
        }
        return view('comments.edit', ['comment' => $comment, 'articles'=>$articles]);
    }

    public function update(Request $request ){
        try{
            $comment = Comments::find($request->comment_id);

            if(empty($comment)){
                abort(404, "El comentario con id '$request' no existe");
            }

            $comment->article_id = $request->article_id;
            $comment->comment_content = $request->content;

            $comment->save();

            return redirect()->action([CommentsController::class, 'index']);
        }catch(Exception $ex){
            Log::error($ex);
        }
    }


    public function delete($id){

        $comment = Comments::find($id);

        if(empty($comment)){
            abort(404, "El comentario con id '$id' no existe");
        }

        $comment->delete();

        return redirect()->action([CommentsController::class, 'index']);
    }
}
