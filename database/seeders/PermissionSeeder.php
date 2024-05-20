<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $list = [
            //Comentarios
            ["name"=>"showComments", "description"=>"Ver Comentario", "module"=>"Comentarios"],
            ["name"=>"createComments", "description"=>"Crear Comentarios", "module"=>"Comentarios"],
            ["name"=>"updateComments", "description"=>"Editar Comentarios", "module"=>"Comentarios"],
            ["name"=>"deleComments", "description"=>"Eliminar Comentarios", "module"=>"Comentarios"],

            //Blogs y Articulos
            ["name"=>"showContent", "description"=>"Ver Contenido", "module"=>"Contenidos"],
            ["name"=>"createContent", "description"=>"Crear Contenidos", "module"=>"Contenidos"],
            ["name"=>"updateContent", "description"=>"Editar Contenidos", "module"=>"Contenidos"],
            ["name"=>"deleContent", "description"=>"Eliminar Contenidos", "module"=>"Contenidos"],

            //Roloes
            ["name"=>"showRoles", "description"=>"Ver Role", "module"=>"Roles"],
            ["name"=>"createRoles", "description"=>"Crear Roles", "module"=>"Roles"],
            ["name"=>"updateRoles", "description"=>"Editar Roles", "module"=>"Roles"],
            ["name"=>"deleRoles", "description"=>"Eliminar Roles", "module"=>"Roles"],

        ];

        foreach($list as $item){
            $permission = Permission::where('name', '=', $item['name'])
                                      ->where('module', '=', $item['module'])
                                      ->first();

            if(empty($permission)){
                $newPermission = new Permission();
                $newPermission -> name=$item['name'];
                $newPermission -> description=$item['description'];
                $newPermission -> module=$item['module'];
                $newPermission -> save();
            }
        }

    }
}
