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
        User::firstOrCreate(
            ['email' => 'admin@kosthub.com'], // cek email
            [
                'name' => 'Fineshyt',
                'jenis_kelamin' => 'Laki-laki',
                'kontak' => '08123456789',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ]
        );

        // Pemilik Kos 1
        User::firstOrCreate(
            ['email' => 'pemilik1@kosthub.com'],
            [
                'name' => 'Pemilik Satu',
                'jenis_kelamin' => 'Laki-laki',
                'kontak' => '082100000001',
                'password' => Hash::make('pemilik123'),
                'role' => 'pemilik',
            ]
        );

        // Pemilik Kos 2
        User::firstOrCreate(
            ['email' => 'pemilik2@kosthub.com'],
            [
                'name' => 'Pemilik Dua',
                'jenis_kelamin' => 'Perempuan',
                'kontak' => '082100000002',
                'password' => Hash::make('pemilik123'),
                'role' => 'pemilik',
            ]
        );

        // Pencari Kos 1
        User::firstOrCreate(
            ['email' => 'pencari1@kosthub.com'],
            [
                'name' => 'Pencari One',
                'jenis_kelamin' => 'Laki-laki',
                'kontak' => '083100000001',
                'password' => Hash::make('pencari123'),
                'role' => 'pencari',
            ]
        );

        // Pencari Kos 2
        User::firstOrCreate(
            ['email' => 'pencari2@kosthub.com'],
            [
                'name' => 'Pencari Two',
                'jenis_kelamin' => 'Perempuan',
                'kontak' => '083100000002',
                'password' => Hash::make('pencari123'),
                'role' => 'pencari',
            ]
        );

        // Pencari Kos 3
        User::firstOrCreate(
            ['email' => 'pencari3@kosthub.com'],
            [
                'name' => 'Pencari Three',
                'jenis_kelamin' => 'Laki-laki',
                'kontak' => '083100000003',
                'password' => Hash::make('pencari123'),
                'role' => 'pencari',
            ]
        );
    }
}
