<?php

use App\Models\Kota;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KeanggotaanController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\ArtikelController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Halaman Login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Proses login
Route::post('/login', [LoginController::class, 'login']);

// Halaman umum
Route::get('/', function () {
    return view('homepage');
})->name('home');

// Halaman statis tanpa controller
Route::view('/formtambahanggota', 'admin.formTambahAnggota');
Route::view('/rangkaiankegiatan', 'rangkaiankegiatan');
Route::view('/formeditgaleri', 'admin.formeditgaleri');
Route::view('/formtambahkegiatan', 'admin.adminkegiatan')->name('formtambahkegiatan');

/*
|--------------------------------------------------------------------------
| Routes untuk Keanggotaan (Public dan Auth)
|--------------------------------------------------------------------------
*/

// Detail anggota muda dan penuh
Route::get('/detailanggotamuda', [KeanggotaanController::class, 'detailAnggotaMuda'])->name('detail.anggota.muda');
Route::get('/detailanggotapenuh', [KeanggotaanController::class, 'detailAnggotaPenuh'])->name('detail.anggota.penuh');

// Daftar anggota penuh dan alumni (gabungan)
Route::get('/anggota-penuh-dan-alumni', [KeanggotaanController::class, 'anggotaPenuhDanAlumni']);
Route::get('/anggota-muda-dan-alumni', [KeanggotaanController::class, 'anggotaMudaDanAlumni']);

// Halaman admin keanggotaan (public view)
Route::middleware(['auth'])->group(function () {
    Route::get('/adminkeanggotaan', [KeanggotaanController::class, 'dataAnggota'])->name('dataAnggota');
});


/*
|--------------------------------------------------------------------------
| Routes yang membutuhkan autentikasi (Middleware auth)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    // Keanggotaan
    Route::post('/tambahAnggota', [KeanggotaanController::class, 'store'])->name('tambahAnggota');
    Route::get('/editAnggota/{id}', [KeanggotaanController::class, 'edit'])->name('editAnggota');
    Route::put('/updateAnggota/{id}', [KeanggotaanController::class, 'update'])->name('updateAnggota');
    Route::get('/deleteAnggota/{id}', [KeanggotaanController::class, 'destroy'])->name('deleteAnggota');

    // Galeri
    Route::get('/admingaleri', [GaleriController::class, 'index'])->name('admin.galeri.index');
    Route::post('/admingaleri', [GaleriController::class, 'store'])->name('admin.galeri.store');
    Route::get('/edit-galeri/{id}', [GaleriController::class, 'edit'])->name('admin.galeri.edit');
    Route::put('/edit-galeri/{id}', [GaleriController::class, 'update'])->name('admin.galeri.update');
    Route::delete('/admingaleri/{id}', [GaleriController::class, 'destroy'])->name('admin.galeri.destroy');

    // Artikel
    Route::get('/adminartikel', [ArtikelController::class, 'index'])->name('admin.artikel.index');
    Route::post('/adminartikel', [ArtikelController::class, 'store'])->name('admin.artikel.store');
     Route::delete('/adminartikel/{id}', [ArtikelController::class, 'destroy'])->name('admin.artikel.destroy');
     Route::get('/adminartikel/{id}/edit', [ArtikelController::class, 'edit'])->name('admin.artikel.edit');
    Route::put('/adminartikel/{id}', [ArtikelController::class, 'update'])->name('admin.artikel.update');
});

/*
|--------------------------------------------------------------------------
| Logout Route
|--------------------------------------------------------------------------
*/

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Halaman umum lain (admin artikel dan lainnya)
|--------------------------------------------------------------------------
*/

Route::get('/keanggotaan', [KeanggotaanController::class, 'index']);
Route::get('/galerikegiatan', [GaleriController::class, 'index']);
Route::get('/artikelkegiatan', [ArtikelController::class, 'index']);

/*
|--------------------------------------------------------------------------
| API Routes (Non-auth)
|--------------------------------------------------------------------------
*/

Route::get('api/kota/{provinsi_id}', function ($provinsi_id) {
    return Kota::where('provinsi_id', $provinsi_id)->get(['id', 'nama']);
});

/*
|--------------------------------------------------------------------------
| Commented out admin middleware group for future use
|--------------------------------------------------------------------------
*/

// Route::middleware(['auth.admin'])->prefix('admin')->name('admin.')->group(function () {
//     Route::get('/keanggotaan', [AdminController::class, 'index'])->name('keanggotaan.index');
//     Route::resource('/keanggotaan', KeanggotaanController::class)->except(['show']);
//     Route::resource('/kegiatan', KegiatanController::class)->except(['show']);
//     Route::resource('/galeri', GaleriController::class)->except(['show']);
//     Route::resource('/artikel', ArtikelController::class)->except(['show']);
// });
