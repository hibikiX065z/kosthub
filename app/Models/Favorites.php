<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kos extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'nama_kos', 'tipe', 'deskripsi', 'lokasi', 'catatan',
        'alamat', 'provinsi', 'kabupaten', 'kecamatan', 'catatan_alamat',
        'latitude', 'longitude', 'foto_depan', 'foto_jalan', 'foto_kamar',
        'foto_kamar_mandi', 'foto_lain', 'fasilitas_umum', 'fasilitas_kamar',
        'fasilitas_kamar_mandi', 'parkir', 'total_kamar', 'kamar_tersedia',
        'harga_per_bulan', 'biaya_tambahan', 'kos_id'
    ];

    public function favorites()
    {
        return $this->hasMany(Favorites::class);
    }
}
