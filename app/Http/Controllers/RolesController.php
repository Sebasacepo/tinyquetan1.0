<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\DB;
use App\Models\RolePermission;
use Illuminate\Support\Facades\Log;
use Exception;

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

        $modules = Permission::all()
                              ->groupBy('module');
        return view('roles.create', ['modules'=>$modules]);
    }

    public function edit($id){

        $role = Role::find($id);

        if(empty($role)){
            abort(404, "El role con id '$id' no existe");
        }

        $permissions = Permission::all();

        $permissions = $permissions->map(function($item) use($id){
            $item->selected = false;

            $rolePermission = RolePermission::where('permission_id', '=', $item->id)
                                            ->where('role_id', '=', $id)
                                            ->first();

            if(!empty($rolePermission)){
                $item->selected = true;
            }
            return $item;
        });

        $modules = $permissions->groupBy('module');

        return view('roles.edit', ['role' => $role, 'modules'=>$modules]);
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

            DB::transaction(function () use ($request){
                //Creación del rol
                $role = new Role();
                $role->name = $request->name;
                $role->save();

                //Crear la relación y permisos
                $permissions = json_decode($request->permissions);

                foreach($permissions as $permission){

                    $rolePermission = new RolePermission();
                    $rolePermission->role_id = $role->id;
                    $rolePermission->permission_id = $permission;
                    $rolePermission->save();
                }
            });

            return redirect()->action([RolesController::class, 'index']);
        }catch(Exception $ex){
            Log::error($ex);
        }
    }

    public function update(Request $request ){
        try{
            DB::transaction(function() use ($request) {

                //Edición de rol
                $role = Role::find($request->role_id);
                $role->name = $request->name;
                $role->save();

                //Eliminación de permisos viejos
                RolePermission::where('role_id', '=', $role->id)
                              ->delete();

                //Crear la relación entre roles y permisos
                $permissions = json_decode($request->permissions);

                foreach($permissions as $permission){

                    $rolePermission = new RolePermission();
                    $rolePermission->role_id = $role->id;
                    $rolePermission->permission_id = $permission;
                    $rolePermission->save();
                }
            });

            return redirect()->action([RolesController::class, 'index']);
        }catch(Exception $ex){
            Log::error($ex);
        }
    }



}
