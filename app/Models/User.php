<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    public function periksasSebagaiPasien()
    {
        return $this->hasMany(Periksa::class, 'id_pasien');
    }

    public function periksasSebagaiDokter()
    {
        return $this->hasMany(Periksa::class, 'id_dokter');
    }

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class, 'id_dokter');
    }
    public function poli()
{
    return $this->belongsTo(Poli::class);
}

}
