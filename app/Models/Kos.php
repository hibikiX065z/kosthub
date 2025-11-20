<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kos extends Model
{
    use HasFactory;

    protected $table = 'kos';

    // Field yang bisa di–mass assign
    protected $fillable = [
        'nama_kos',
        'lokasi',
        'harga',
        'tipe',
        'fasilitas',
        'owner_id'
    ];

    // otomatis cast JSON → array
    protected $casts = [
        'fasilitas' => 'array',
    ];

    // Relasi ke owner (user)
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
