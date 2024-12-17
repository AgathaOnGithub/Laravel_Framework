<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Data awal untuk roles
        $roles = [
            ['id' => Str::uuid(), 'name' => 'Admin', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'name' => 'User', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'name' => 'Guest', 'created_at' => now(), 'updated_at' => now()],
        ];

        // Insert ke database
        DB::table('roles')->insert($roles);
    }
}
