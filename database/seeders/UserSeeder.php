<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Data awal untuk users
        $users = [
            [
                'id' => Str::uuid(),
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'), // Password default
                'role_id' => DB::table('roles')->where('name', 'Admin')->value('id'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Regular User',
                'email' => 'user@example.com',
                'password' => Hash::make('password'),
                'role_id' => DB::table('roles')->where('name', 'User')->value('id'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert ke database
        DB::table('users')->insert($users);
    }
}
