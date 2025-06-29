<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PeriksaController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\RiwayatPasienController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PoliController;

Route::get('/', function () {
    return view('/auth/login');
});

Route::prefix('admin')->middleware('role:admin')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('admin.home');

    Route::get('/dokter', [UserController::class, 'dokter'])->name('admin.dokter');
    Route::get('/dokter/create', [UserController::class, 'admincreate'])->name('admin.dokter.create');
    Route::post('/dokter', [UserController::class, 'store2'])->name('admin.dokter.store');
    Route::get('/dokter/{dokter}/edit', [UserController::class, 'adminedit'])->name('admin.dokter.edit');
    Route::put('/dokter/{dokter}', [UserController::class, 'adminupdate'])->name('admin.dokter.update');
    Route::delete('/dokter/{dokter}', [UserController::class, 'admindestroy'])->name('admin.dokter.destroy');



    Route::get('/pasien', [UserController::class, 'pasien'])->name('admin.pasien');
    Route::get('/pasien/create', [UserController::class, 'admincreate2'])->name('admin.pasien.create');
    Route::post('/pasien', [UserController::class, 'store3'])->name('admin.pasien.store');
    Route::get('/pasien/{pasien}/edit', [UserController::class, 'adminedit2'])->name('admin.pasien.edit');
    Route::put('/pasien/{pasien}', [UserController::class, 'adminupdate2'])->name('admin.pasien.update');
    Route::delete('/pasien/{pasien}', [UserController::class, 'admindestroy2'])->name('admin.pasien.destroy');

    Route::resource('poli', PoliController::class); // sesuaikan controller

    Route::get('/obat', [ObatController::class, 'admin'])->name('admin.obat'); // sesuaikan controller
    Route::get('/obat/create', [ObatController::class, 'createadmin'])->name('admin.obat.create');
    Route::post('/obat', [ObatController::class, 'store2'])->name('admin.obat.store');
    Route::get('/obat/{obat}/edit', [ObatController::class, 'adminedit'])->name('admin.obat.edit');
    Route::put('/obat/{obat}', [ObatController::class, 'adminupdate'])->name('admin.obat.update');
    Route::delete('/obat/{obat}', [ObatController::class, 'admindestroy'])->name('admin.obat.destroy');



});

Route::prefix('dokter')->middleware('role:dokter')->group(function () {
    Route::get('/', [HomeController::class, 'dokter'])->name('dokter.home');
    Route::resource('obat', ObatController::class);
    Route::resource('periksa', PeriksaController::class);
    Route::get('/riwayat-pasien', [RiwayatPasienController::class, 'index'])->name('riwayat.index');
    Route::get('/riwayat-pasien/{pasien}', [RiwayatPasienController::class, 'show'])->name('dokter.riwayat.show');

    Route::resource('jadwal', JadwalController::class)->except(['edit', 'update', 'show']);
    Route::get('/profil/index', [UserController::class, 'showProfile'])->name('profil.index');
;

    // Form edit profil dokter
    Route::get('/dokter/profil/edit', [UserController::class, 'editProfile'])->name('dokter.profil.edit');

    // Proses update profil dokter
    Route::put('/dokter/profil/{user}', [UserController::class, 'update4'])->name('dokter.profil.update');
    

});


Route::prefix('pasien')->middleware('role:pasien')->group(function () {
    Route::get('/', [PeriksaController::class, 'index'])->name('pasien.home');
    Route::get('/periksa', [PeriksaController::class, 'pasienindex'])->name('periksa.pasienindex');
    Route::get('/pasien/periksa', [PeriksaController::class, 'pasienindex'])->name('periksa.pasienindex');
    Route::get('/periksa/create', [PeriksaController::class, 'pasiencreate'])->name('pasien.periksa.create');
    Route::post('/periksa/store', [PeriksaController::class, 'pasienstore'])->name('pasien.periksa.store');
    Route::get('/riwayat', [PeriksaController::class, 'riwayatIndex'])->name('pasien.riwayat.index');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
