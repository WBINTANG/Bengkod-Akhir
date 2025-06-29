<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;


class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $obats = Obat::all();
        return view('dokter/obat.index', compact('obats'));


    }

    /**
     * ADMIN
     */
     public function admin()
    {
        $obats = Obat::all();
        return view('admin/obat.index', compact('obats'));


    }
    public function createadmin()
    {
        return view('admin/obat.create');
    }
    public function store2(Request $request)
    {
        $request->validate([
            'nama_obat' => 'required',
            'kemasan' => 'required',
            'harga' => 'required',
        ]);
        Obat::create($request->all());
        return redirect()->route('admin.obat');

    }
    public function adminedit(Obat $obat)
    {
        return view('admin/obat.edit', compact('obat'));
    }
    public function adminupdate(Request $request, Obat $obat)
    {
        
            $request->validate([
                'nama_obat' => 'required',
                'kemasan' => 'required',
                'harga' => 'required'
            ]);
            $obat->update($request->all());
            return redirect()->route('admin.obat');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function admindestroy(Obat $obat)
    {
        $obat->delete();
        return redirect()->route('admin.obat');

    }
    /**
     * ADMIN akhir
     */

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dokter/obat.create');
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_obat' => 'required',
            'kemasan' => 'required',
            'harga' => 'required',
        ]);
        Obat::create($request->all());
        return redirect()->route('obat.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Obat $obat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Obat $obat)
    {
        return view('dokter/obat.edit', compact('obat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Obat $obat)
    {
        
            $request->validate([
                'nama_obat' => 'required',
                'kemasan' => 'required',
                'harga' => 'required'
            ]);
            $obat->update($request->all());
            return redirect()->route('obat.index');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Obat $obat)
    {
        $obat->delete();
        return redirect()->route('obat.index');

    }
}
