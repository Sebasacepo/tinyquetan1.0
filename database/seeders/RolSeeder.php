<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['ANON', 'USER', 'ADMIN', 'MASTER'];

        foreach($roles as $rol){
            DB::table('roles') ->insert([
                'guard_name' => 'web',
                'name' => $rol
            ]);
        }

        Permission::create(['name' => 'create-users']);
        Permission::create(['name'=> 'edit-users']);
        Permission::create(['name' => 'delete-users']);
        Permission::create(['name' => 'view-users']);


        Permission::create(['name' => 'create-articles']);
        Permission::create(['name'=> 'edit-articles']);
        Permission::create(['name' => 'delete-articles']);
        Permission::create(['name' => 'view-articles']);
    }
}
