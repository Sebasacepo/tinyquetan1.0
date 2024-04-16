<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'name' => $rol
            ]);
        }
    }
}
