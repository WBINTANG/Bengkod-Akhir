<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Poli;

class PoliSeeder extends Seeder
{
    public function run(): void
    {
        Poli::insert([
            ['nama_poli' => 'Poli Umum', 'keterangan' => 'Menangani pasien umum'],
            ['nama_poli' => 'Poli Gigi', 'keterangan' => 'Perawatan gigi dan mulut'],
            ['nama_poli' => 'Poli Anak', 'keterangan' => 'Spesialis anak'],
            ['nama_poli' => 'Poli THT', 'keterangan' => 'Telinga, Hidung, Tenggorokan'],
            ['nama_poli' => 'Poli Mata', 'keterangan' => 'Pelayanan kesehatan mata'],
        ]);
    }
}

