<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kos extends Model
{
    use HasFactory;

    protected $table = 'kos';

    protected $fillable = [
        'pemilik_id',

        // STEP 1 — Informasi Dasar
        'nama_kos',
        'tipe',
        'deskripsi',
        'catatan',

        // STEP 2 — Lokasi
        'alamat',
        'provinsi',
        'kabupaten',
        'kecamatan',
        'catatan_alamat',
        'latitude',
        'longitude',

        // STEP 3 — Foto
        'foto_depan',
        'foto_jalan',
        'foto_kamar',
        'foto_kamar_mandi',
        'foto_lain',
        
        // STEP 5 — Kamar
        'total_kamar',
        'kamar_tersedia',

        // STEP 6 — Harga
        'harga_per_bulan',
        'biaya_tambahan',
        'status',
    ];

    protected $casts = [
        'fasilitas' => 'array',
        'fasilitas_umum' => 'array',
        'fasilitas_kamar' => 'array',
        'fasilitas_kamar_mandi' => 'array',
        'parkir' => 'array',
        'latitude' => 'float',
        'longitude' => 'float',
    ];

    // relasi owner
    public function pemilik()
    {
        return $this->belongsTo(\App\Models\User::class, 'pemilik_id');
    }
}
