<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // User test
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'username' => 'testuser',
        //     'email' => 'test@example.com',
        //     'password' => Hash::make('password'),
        //     'role' => 'tester',
        // ]);

        // Jalankan seeder user lain
        $this->call(UserSeeder::class);
    }
}
