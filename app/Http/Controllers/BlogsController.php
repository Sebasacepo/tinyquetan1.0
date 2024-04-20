<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    public function index()
    {

        $blogs = Blog::all();

        return view('blogs.index', ['blogs'=>$blogs]);
    }

    public function create(){
        return view('blogs.create');
    }

    public function store(Request $request ){
        try{
            $blogs = new Blog();
            $blogs->titulo = $request->titulo;
            $blogs->describcion = $request->describcion;
            $blogs->category = $request->category;

            $blogs->save();

            return redirect()->action([BlogsController::class, 'index']);
        }catch(Exception $ex){
            Log::error($ex);
        }
    }

    public function edit($id){

        $blog = Blog::find($id);

        if(empty($blog)){
            abort(404, "El blog con id '$id' no existe");
        }
        return view('blogs.edit', ['blog' => $blog]);
    }


    public function update(Request $request ){
        try{
            $blog = Blog::find($request->blog_id);

            if(empty($blog)){
                abort(404, "El blog con id '$request' no existe");
            }

            $blog->titulo = $request->titulo;
            $blog->describcion = $request->describcion;
            $blog->category = $request->category;

            $blog->save();

            return redirect()->action([BlogsController::class, 'index']);
        }catch(Exception $ex){
            Log::error($ex);
        }
    }


    public function delete($id){

        $blog = Blog::find($id);

        if(empty($blog)){
            abort(404, "El blog con id '$id' no existe");
        }

        $blog->delete();

        return redirect()->action([BlogsController::class, 'index']);
    }
}
