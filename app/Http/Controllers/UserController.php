<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function showProfile()
{
    
    $profil = Auth::user(); // Ambil data user yang sedang login
    return view('dokter/profil.index', compact('profil'));
}
public function editProfile()
{
    $profil = Auth::user(); // Ambil user yang sedang login
    return view('dokter.profil.edit', compact('profil'));
}

 public function update4(Request $request)
{
    $profil = Auth::user(); // Ambil user yang sedang login

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => "required|email|unique:users,email,{$profil->id}",
        // 'role' tidak perlu diedit oleh user sendiri
    ]);

    if ($request->filled('password')) {
        $validated['password'] = Hash::make($request->password);
    }

    $profil->update($validated);

    return redirect()->route('profil.index')->with('success', 'Profil berhasil diperbarui.');
}


    /**
     * ADMIN.
     */
    public function dokter()
    {
        $users = User::where('role', 'dokter')->get();
        return view('admin/dokter.index', compact('users'));
    }

    
    public function admincreate()
    {
        return view('admin/dokter.create');
    }
    public function store2(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:dokter,pasien,admin', // sesuaikan jika perlu
        ]);

        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        return redirect()->route('admin.dokter')->with('success', 'User berhasil ditambahkan.');
    }

     public function adminedit(User $dokter)
    {
        return view('admin.dokter.edit', compact('dokter'));
    }

    // Update data dokter
    public function adminupdate(Request $request, User $dokter)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:users,email,{$dokter->id}",
            'role' => 'required|in:dokter,pasien,admin',
        ]);

        if ($request->filled('password')) {
            $validated['password'] = Hash::make($request->password);
        }

        $dokter->update($validated);

        return redirect()->route('admin.dokter')->with('success', 'User berhasil diperbarui.');
    }

    // Hapus data dokter
    public function admindestroy2(User $dokter)
    {
        $dokter->delete();
        return redirect()->route('admin.dokter')->with('success', 'User berhasil dihapus.');
    }
    /**
     * ADMIN AKHIR.
     */
    public function pasien()
{
    $users = User::where('role', 'pasien')->get();
    return view('admin.pasien.index', compact('users'));
}

public function admincreate2()
{
    return view('admin.pasien.create');
}

public function store3(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6|confirmed',
        'role' => 'required|in:dokter,pasien,admin', // role masih sama karena bisa pasien, dokter, admin
    ]);

    $validated['password'] = Hash::make($validated['password']);

    User::create($validated);

    return redirect()->route('admin.pasien')->with('success', 'User berhasil ditambahkan.');
}

public function adminedit2(User $pasien)
{
    return view('admin.pasien.edit', compact('pasien'));
}

// Update data pasien
public function adminupdate2(Request $request, User $pasien)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => "required|email|unique:users,email,{$pasien->id}",
        'role' => 'required|in:dokter,pasien,admin',
    ]);

    if ($request->filled('password')) {
        $validated['password'] = Hash::make($request->password);
    }

    $pasien->update($validated);

    return redirect()->route('admin.pasien')->with('success', 'User berhasil diperbarui.');
}

// Hapus data pasien
public function admindestroy(User $pasien)
{
    $pasien->delete();
    return redirect()->route('admin.pasien')->with('success', 'User berhasil dihapus.');
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:dokter,pasien,admin', // sesuaikan jika perlu
        ]);

        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }
    
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:users,email,{$user->id}",
            'role' => 'required|in:dokter,pasien,admin',
        ]);

        if ($request->filled('password')) {
            $validated['password'] = Hash::make($request->password);
        }

        $user->update($validated);

        return redirect()->route('users.index')->with('success', 'User berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
    }
}
