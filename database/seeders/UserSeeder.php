<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Fineshyt',
            'jenis_kelamin' => 'Laki-laki',
              'kontak' => '08123456789',
            'email' => 'admin@kosthub.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // Pemilik Kos
        User::create([
            'name' => 'Pemilik Kos',
            'email' => 'pemilik@kosthub.com',
            'password' => Hash::make('pemilik123'),
            'jenis_kelamin' => 'Perempuan',
            'kontak' => '081222333444',
            'role' => 'pemilik',
        ]);

        // Pencari Kos
        User::create([
            'name' => 'Pencari Kos',
            'email' => 'pencari@kosthub.com',
            'password' => Hash::make('pencari123'),
            'jenis_kelamin' => 'Laki-laki',
            'kontak' => '081555666777',
            'role' => 'pencari',
        ]);
    }
}