<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comments;

class CommentsController extends Controller
{
    public function index()
    {

        $comment = Comments::all();

        return view('comments.index', ['comments'=>$comment]);
    }

    public function create(){
        return view('comments.create');
    }

    public function store(Request $request ){
        try{
            $comment = new Comments();
            $comment->article_id = $request->article_id;
            $comment->content = $request->content;
            $comment->date = now();

            $comment->save();

            return redirect()->action([CommentsController::class, 'index']);
        }catch(Exception $ex){
            Log::error($ex);
        }
    }

    public function edit($id){

        $comment = Comments::find($id);

        if(empty($comment)){
            abort(404, "El comentario con id '$id' no existe");
        }
        return view('comments.edit', ['comment' => $comment]);
    }


    public function update(Request $request ){
        try{
            $comment = Comments::find($request->comment_id);

            if(empty($comment)){
                abort(404, "El comentario con id '$request' no existe");
            }

            $comment->article_id = $request->article_id;
            $comment->content = $request->content;

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
