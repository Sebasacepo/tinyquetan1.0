<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;

class RolesController extends Controller
{
    public function index(Request $request)
    {
        if(!empty($request->records_per_page)){
            $request -> records_per_page = $request -> records_per_page <= env('PAGINATION_MAX_SIZE') ? $request -> records_per_page : env('PAGINATION_MAX_SIZE');
        }else{
            $request -> records_per_page = env('PAGINATION_DEFAULT_SIZE');
        }

        $roles = Role::where('name','LIKE',"%$request->filter%")->paginate($request->records_per_page);;

        return view('roles.index', ['roles'=>$roles, 'data'=>$request]);
    }

    public function create(){
        return view('roles.create');
    }

    public function edit($id){

        $role = Role::find($id);

        if(empty($blog)){
            abort(404, "El role con id '$id' no existe");
        }
        return view('roles.edit', ['role' => $role]);
    }

    public function delete($id){

        $role = Role::find($id);

        if(empty($role)){
            abort(404, "El role con id '$id' no existe");
        }

        $role->delete();

        return redirect()->action([RolesController::class, 'index']);
    }


    public function store(Request $request ){
        try{
            $role = new Role();
            $role->name = $request->name;

            $role->save();

            return redirect()->action([RolesController::class, 'index']);
        }catch(Exception $ex){
            Log::error($ex);
        }
    }

    public function update(Request $request ){
        try{
            $role = Role::find($request->role_id);

            if(empty($blog)){
                abort(404, "El role con id '$request' no existe");
            }

            $role = new Role();
            $role->name = $request->name;

            $role->save();

            return redirect()->action([RolesController::class, 'index']);
        }catch(Exception $ex){
            Log::error($ex);
        }
    }



}
