<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Kos;

class KosSeeder extends Seeder
{
    public function run()
    {
        Kos::insert([
            [
                'nama' => 'Kos Nyaman Bali',
                'lokasi' => 'Bali',
                'alamat' => 'Denpasar Selatan',
                'harga' => 1200000,
                'tipe' => 'campur',
                'fasilitas' => json_encode(['AC', 'WiFi', 'Kamar Mandi Dalam']),
                'gambar' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c',
            ],
            [
                'nama' => 'Kos Putri Harmoni',
                'lokasi' => 'Bali',
                'alamat' => 'Kuta Utara',
                'harga' => 900000,
                'tipe' => 'putri',
                'fasilitas' => json_encode(['WiFi', 'Lemari', 'Meja']),
                'gambar' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c',
            ],
            [
                'nama' => 'Kos Putra Asri Jogja',
                'lokasi' => 'Jogja',
                'alamat' => 'Depok Sleman',
                'harga' => 850000,
                'tipe' => 'putra',
                'fasilitas' => json_encode(['AC', 'KM Dalam']),
                'gambar' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c',
            ],
            [
                'nama' => 'Kos Murah Bandung',
                'lokasi' => 'Bandung',
                'alamat' => 'Cicendo',
                'harga' => 650000,
                'tipe' => 'campur',
                'fasilitas' => json_encode(['WiFi']),
                'gambar' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c',
            ],
        ]);
    }
}
