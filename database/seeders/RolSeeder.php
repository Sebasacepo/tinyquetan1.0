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

        Permission::create(['name' => 'create.users']) ->syncRoles($roles);
        Permission::create(['name'=> 'edit.users'])->assignRole($roles[3], $roles[2]);
        Permission::create(['name' => 'delete.users'])->assignRole($roles[3], $roles[2]);
        Permission::create(['name' => 'view.users'])->assignRole($roles[3], $roles[2]);


        Permission::create(['name' => 'create.articles'])->assignRole($roles[3], $roles[2], $roles[1]);
        Permission::create(['name'=> 'edit.articles'])->assignRole($roles[3], $roles[2], $roles[1]);
        Permission::create(['name' => 'delete.articles'])->assignRole($roles[3], $roles[2], $roles[1]);
        Permission::create(['name' => 'view.articles'])->syncRoles($roles);



    }
}
