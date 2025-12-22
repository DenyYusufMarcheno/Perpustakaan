<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Admin User
        User::create([
            'name' => 'Admin Perpustakaan',
            'email' => 'admin@perpustakaan.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // Create Petugas User
        User::create([
            'name' => 'Petugas Perpustakaan',
            'email' => 'petugas@perpustakaan.com',
            'password' => Hash::make('petugas123'),
            'role' => 'petugas',
        ]);

        // Create Anggota User
        User::create([
            'name' => 'Anggota Perpustakaan',
            'email' => 'anggota@perpustakaan.com',
            'password' => Hash::make('anggota123'),
            'role' => 'anggota',
        ]);
    }
}
