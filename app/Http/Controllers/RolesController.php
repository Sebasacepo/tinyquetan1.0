<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index(Request $request)
    {
        if(!empty($request->records_per_page)){
            $request -> records_per_page = $request -> records_per_page <= env('PAGINATION_MAX_SIZE') ? $request -> records_per_page : env('PAGINATION_MAX_SIZE');
        }else{
            $request -> records_per_page = env('PAGINATION_DEFAULT_SIZE');
        }

        $roles = Role::where('titulo','LIKE',"%$request->filter%")
        ->paginate($request->records_per_page);;

        return view('roles.index', ['roles'=>$roles, 'data'=>$request]);
    }

    public function create(){
        return view('roles.create');
    }

    public function store(Request $request ){
        try{
            $role = new Role();
            $role->name = $request->titulo;            

            $role->save();

            return redirect()->action([RolesController::class, 'index']);
        }catch(Exception $ex){
            Log::error($ex);
        }
    }

    public function edit($id){

        $role = Role::find($id);

        if(empty($role)){
            abort(404, "El rol con id '$id' no existe");
        }
        return view('role.edit', ['role' => $role]);
    }


    public function update(Request $request ){
        try{
            $role = Role::find($request->role_id);

            if(empty($role)){
                abort(404, "El role con id '$request' no existe");
            }

            $role->titulo = $request->titulo;
            $role->describcion = $request->describcion;
            $role->category = $request->category;

            $role->save();

            return redirect()->action([RolesController::class, 'index']);
        }catch(Exception $ex){
            Log::error($ex);
        }
    }


    public function delete($id){

        $role = Role::find($id);

        if(empty($role)){
            abort(404, "El role con id '$id' no existe");
        }

        $role->delete();

        return redirect()->action([RolesController::class, 'index']);
    }
}
