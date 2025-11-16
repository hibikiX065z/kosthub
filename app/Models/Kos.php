<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kos extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kos',
        'alamat',
        'lokasi',
        'harga',
        'pemilik_id',
        'status' // aktif / pending / nonaktif
    ];

    public function pemilik()
    {
        return $this->belongsTo(User::class, 'pemilik_id');
    }
}
