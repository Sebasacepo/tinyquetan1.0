<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Permission;
use App\Models\Role;
use App\Models\RolePermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Admin
        $adminRole = new Role();
        $adminRole -> name ="Administrador";
        $adminRole -> save();

        //Comments role
        $commentsPermission = Permission::where('module', '=', 'Comentarios')->get();

        $commentsRole = new Role();
        $commentsRole->name = "Editor de comentarios";
        $commentsRole->save();

        foreach($commentsPermission as $permission){
            $rolePermission = new RolePermission();
            $rolePermission -> role_id = $commentsRole->id;
            $rolePermission -> permission_id = $permission -> id;
            $rolePermission -> save();
        }

        //Content Role
        $contentPermission = Permission::where('module', '=', 'Contenidos')->get();

        $contentRole = new Role();
        $contentRole->name = "Editor de contenidos";
        $contentRole->save();

        foreach($contentPermission as $permission){
            $rolePermission = new RolePermission();
            $rolePermission -> role_id = $contentRole->id;
            $rolePermission -> permission_id = $permission -> id;
            $rolePermission -> save();
        }

        //Users

        $user = new User();
        $user -> first_name = 'David';
        $user -> last_name = 'Morales';
        $user -> document = '11111';
        $user -> email = 'admin@gmail.com';
        $user -> email_verified_at = now();
        $user -> password = Hash::make('1234');
        $user -> role_id = $adminRole -> id;
        $user -> save();

        $user = new User();
        $user -> first_name = 'Carolina';
        $user -> last_name = 'Duque';
        $user -> document = '22222';
        $user -> email = 'comentario@gmail.com';
        $user -> email_verified_at = now();
        $user -> password = Hash::make('1234');
        $user -> role_id = $commentsRole -> id;
        $user -> save();

        $user = new User();
        $user -> first_name = 'Carolina';
        $user -> last_name = 'Duque';
        $user -> document = '22222';
        $user -> email = 'contenido@gmail.com';
        $user -> email_verified_at = now();
        $user -> password = Hash::make('1234');
        $user -> role_id = $contentRole -> id;
        $user -> save();

    }
}
