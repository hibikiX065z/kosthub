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
        User::factory()->create([
            'name' => 'Fineshyt',
            'jenis_kelamin' => 'Laki-laki',
            'kontak' => '08123456789',
            'email' => 'admin@kosthub.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);
    }
}