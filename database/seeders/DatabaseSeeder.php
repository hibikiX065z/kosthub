<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory()->create([
        'name' => 'Owner Premium',
        'email' => 'owner@test.com',
        'password' => bcrypt('password'),
    ]);

        $this->call([
        UserSeeder::class,
        ]);
    }
}
