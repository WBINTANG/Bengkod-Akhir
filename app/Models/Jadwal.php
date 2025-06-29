<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_dokter',
        'waktu',
        'tersedia',
    ];

    public function dokter()
    {
        return $this->belongsTo(User::class, 'id_dokter');
    }
}
