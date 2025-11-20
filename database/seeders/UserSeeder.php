<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::factory()->create([
            'name' => 'Fineshyt',
            'jenis_kelamin' => 'Laki-laki',
            'kontak' => '08123456789',
            'email' => 'admin@kosthub.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // Pemilik Kos
        User::factory()->create([
            'name' => 'Pemilik Satu',
            'jenis_kelamin' => 'Laki-laki',
            'kontak' => '082100000001',
            'email' => 'pemilik1@kosthub.com',
            'password' => Hash::make('pemilik123'),
            'role' => 'pemilik',
        ]);

        User::factory()->create([
            'name' => 'Pemilik Dua',
            'jenis_kelamin' => 'Perempuan',
            'kontak' => '082100000002',
            'email' => 'pemilik2@kosthub.com',
            'password' => Hash::make('pemilik123'),
            'role' => 'pemilik',
        ]);

        // Pencari Kos
        User::factory()->create([
            'name' => 'Pencari One',
            'jenis_kelamin' => 'Laki-laki',
            'kontak' => '083100000001',
            'email' => 'pencari1@kosthub.com',
            'password' => Hash::make('pencari123'),
            'role' => 'pencari',
        ]);

        User::factory()->create([
            'name' => 'Pencari Two',
            'jenis_kelamin' => 'Perempuan',
            'kontak' => '083100000002',
            'email' => 'pencari2@kosthub.com',
            'password' => Hash::make('pencari123'),
            'role' => 'pencari',
        ]);

        User::factory()->create([
            'name' => 'Pencari Three',
            'jenis_kelamin' => 'Laki-laki',
            'kontak' => '083100000003',
            'email' => 'pencari3@kosthub.com',
            'password' => Hash::make('pencari123'),
            'role' => 'pencari',
        ]);
    }
}
