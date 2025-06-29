<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwals = Jadwal::where('id_dokter', Auth::id())->get();
        return view('dokter.jadwal.index', compact('jadwals'));
    }

    public function create()
    {
        return view('dokter.jadwal.create');
    }

    public function store(Request $request)
{
    $request->validate(['waktu' => 'required|date']);

    Jadwal::create([
    'id_dokter' => Auth::id(),
    'waktu' => Carbon::parse($request->waktu),
    'tersedia' => 1,
]);


    return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan.');
}


    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}
