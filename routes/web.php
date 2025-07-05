<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingController;            // ← untuk halaman publik
use App\Http\Controllers\Admin\{
    YuniKaderController,
    YuniPosyanduController,
    YuniBalitaController,
    YuniJadwalController,
    YuniPemeriksaanController,
    YuniBeritaController
};
use App\Http\Middleware\EnsureAdmin;

/* ---------- RUTE PUBLIK (tanpa login) ---------- */
Route::get('/',       [LandingController::class, 'index'])->name('home');
Route::get('/jadwal', [LandingController::class, 'jadwal'])->name('jadwal');
Route::get('/berita', [LandingController::class, 'showBerita'])->name('berita');
Route::view('/dokumentasi', 'landing.dokumentasi')->name('dokumentasi');
Route::view('/kontak', 'landing.kontak')->name('kontak');
Route::get('/daftar-anak', [LandingController::class, 'formDaftarAnak'])->name('daftar.anak');
Route::post('/daftar-anak', [LandingController::class, 'daftarAnak']);
Route::get('/cek-anak', [LandingController::class, 'formCekAnak'])->name('cek.anak');
Route::post('/cek-anak', [LandingController::class, 'cekAnak']);

/* ---------- LOGIN / LOGOUT ---------- */
Route::middleware('guest')->group(function () {
    Route::get ('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});
Route::post('/logout', [AuthController::class, 'logout'])
      ->middleware('auth')
      ->name('logout');

/* ---------- DASHBOARD + CRUD ADMIN ---------- */
Route::prefix('admin')
      ->middleware(['auth', EnsureAdmin::class])
      ->name('admin.')
      ->group(function () {
          Route::get('/', [\App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');
          Route::resource('kader',    YuniKaderController::class);
          Route::resource('posyandu', YuniPosyanduController::class);
          Route::resource('balita',   YuniBalitaController::class);
          Route::resource('jadwal',   YuniJadwalController::class);
          Route::resource('pemeriksaan', YuniPemeriksaanController::class);
          Route::resource('berita',   YuniBeritaController::class);
});

// Resource dummy untuk menu baru di admin
Route::prefix('admin')->middleware(['auth', EnsureAdmin::class])->name('admin.')->group(function () {
    Route::resource('imunisasi', \App\Http\Controllers\Admin\YuniImunisasiController::class);
    Route::resource('vaksin', \App\Http\Controllers\Admin\YuniVaksinController::class);
    Route::resource('anak', \App\Http\Controllers\Admin\YuniAnakController::class);
    Route::resource('ibu', \App\Http\Controllers\Admin\YuniIbuController::class);
    Route::resource('petugas', \App\Http\Controllers\Admin\YuniPetugasController::class);
    Route::resource('posyandu', YuniPosyanduController::class);
    Route::resource('penimbangan', \App\Http\Controllers\Admin\YuniPenimbanganController::class);
    Route::resource('riwayatvaksin', \App\Http\Controllers\Admin\YuniRiwayatVaksinController::class);
});
