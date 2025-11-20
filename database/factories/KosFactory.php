<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KosFactory extends Factory
{
    public function definition(): array
    {
        $fasilitas = [
            'WiFi',
            'AC',
            'Kamar Mandi Dalam',
            'Kasur',
            'Lemari',
            'Parkiran',
        ];

        return [
            'nama_kos' => $this->faker->company . ' Kost',
            'alamat' => $this->faker->streetAddress(),
            'lokasi' => $this->faker->randomElement(['Jember', 'Malang', 'Surabaya', 'Bandung']),
            'harga' => $this->faker->numberBetween(500000, 2000000),
            'gender' => $this->faker->randomElement(['Putra', 'Putri', 'Campur']),
            'fasilitas' => json_encode($this->faker->randomElements($fasilitas, 3)),
            'owner_id' => 1 // sementara default
        ];
    }
}
