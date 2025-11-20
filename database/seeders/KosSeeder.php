<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kos;

class KosSeeder extends Seeder
{
    public function run(): void
    {
        Kos::factory()->count(20)->create();
    }
}
