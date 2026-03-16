<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Buat Akun Admin Utama
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@graflearn.com',
            'password' => Hash::make('admin123'), // Password Admin
            'role' => 'admin',
            'kelas' => null, // Admin tidak punya kelas
        ]);
    }
}