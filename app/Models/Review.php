<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews'; // nama tabel, sesuaikan kalau beda
    protected $fillable = [
        'kos_id',      // foreign key ke tabel kos
        'user_id',     // siapa yang memberi review
        'rating',      // rating, misal 1-5
        'comment',     // teks komentar
        'created_at',  // tanggal review (opsional kalau pakai timestamps default)
        'updated_at',
    ];

    // Relasi ke kos
    public function kos()
    {
        return $this->belongsTo(Kos::class);
    }

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
