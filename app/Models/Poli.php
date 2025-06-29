<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    use HasFactory;

    // Nama tabel jika tidak mengikuti default (yaitu jamak = 'polis')
    protected $table = 'poli';

    // Kolom yang boleh diisi mass-assignment (dari form, seeder, dsb)
    protected $fillable = [
        'nama_poli',
        'keterangan',
    ];
}
