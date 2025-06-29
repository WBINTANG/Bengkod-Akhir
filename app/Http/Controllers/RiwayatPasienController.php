<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Periksa;
use Illuminate\Support\Facades\Auth;

class RiwayatPasienController extends Controller
{
    public function index()
    {
        $dokterId = Auth::id();

        $pasiens = User::where('role', 'pasien')
            ->whereHas('periksasSebagaiPasien', function ($query) use ($dokterId) {
                $query->where('id_dokter', $dokterId);
            })
            ->get();

        return view('dokter.riwayat.index', compact('pasiens'));
    }

    public function show(User $pasien)
    {
        $dokterId = Auth::id();

        $riwayat = Periksa::with('obats')
            ->where('id_pasien', $pasien->id)
            ->where('id_dokter', $dokterId)
            ->get();

            foreach ($riwayat as $item) {
                $item->total_biaya = $item->biaya_periksa + $item->obats->sum('harga');
            }

        return view('dokter.riwayat.show', compact('pasien', 'riwayat'));
    }
}
