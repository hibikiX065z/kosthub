<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // Cegah duplikat email
        User::firstOrCreate(
            ['email' => 'owner@test.com'],  // cek email
            [
                'name' => 'Owner Premium',
                'password' => bcrypt('password'),
            ]
        );

        $this->call([
            UserSeeder::class,
        ]);
    }
}
