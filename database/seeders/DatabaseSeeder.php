<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seeder untuk Admin
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('adminpassword'),  // Password untuk login
            'role' => 'admin',  // Role Admin
        ]);

        // Seeder untuk Karyawan
        User::create([
            'name' => 'Karyawan User',
            'email' => 'karyawan@example.com',
            'password' => Hash::make('karyawanpassword'),  // Password untuk login
            'role' => 'karyawan',  // Role Karyawan
        ]);
    }
}

