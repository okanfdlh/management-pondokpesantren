<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Petugas Kesehatan',
            'username' => 'kesehatan',
            'email' => 'kesehatan@example.com',
            'password' => Hash::make('password'),
            'role' => 'kesehatan',
        ]);

        User::create([
            'name' => 'Wali Santri',
            'username' => 'wali',
            'email' => 'wali@example.com',
            'password' => Hash::make('password'),
            'role' => 'wali',
        ]);
    }
}
