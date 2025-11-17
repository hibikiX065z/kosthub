<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aktivitas extends Model
{
    protected $table = 'aktivitas';

    protected $fillable = [
        'user_id',
        'kegiatan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
