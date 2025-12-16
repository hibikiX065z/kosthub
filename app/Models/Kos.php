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
        'alamat',
        'provinsi',
        'kabupaten',
        'kecamatan',
        'catatan_alamat',
        'latitude',
        'longitude',
        'foto_depan',
        'foto_jalan',
        'foto_kamar',
        'foto_kamar_mandi',
        'foto_lain',

        // STEP 5 — Kamar
        'total_kamar',
        'kamar_tersedia',
        'harga_per_bulan',
        'biaya_tambahan',
        'status',
    ];

    protected $casts = [
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

    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }

    public function isFavorited()
    {
        return $this->favorites()->where('user_id', auth()->id())->exists();
    }


    // Accessor foto supaya langsung dapat URL
    public function getFotoDepanUrlAttribute()
    {
        return $this->foto_depan ? asset('storage/' . $this->foto_depan) : asset('img/default-kos.png');
    }

    public function getFotoJalanUrlAttribute()
    {
        return $this->foto_jalan ? asset('storage/' . $this->foto_jalan) : null;
    }

    public function getFotoKamarUrlAttribute()
    {
        return $this->foto_kamar ? asset('storage/' . $this->foto_kamar) : null;
    }

    public function getFotoKamarMandiUrlAttribute()
    {
        return $this->foto_kamar_mandi ? asset('storage/' . $this->foto_kamar_mandi) : null;
    }

    public function getFotoLainUrlAttribute()
    {
        return $this->foto_lain ? asset('storage/' . $this->foto_lain) : null;
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
