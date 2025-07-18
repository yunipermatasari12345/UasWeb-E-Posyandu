<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\{
    YuniKaderController,
    YuniPosyanduController,
    YuniBalitaController,
    YuniJadwalController,
    YuniPemeriksaanController,
    YuniBeritaController,
    YuniAnakController,
    YuniIbuController,
    YuniLansiaController,
    PendaftaranController,
    PengaduanController
};

// RUTE PUBLIK (tanpa login)
Route::get('/',       [LandingController::class, 'index'])->name('home');
Route::get('/jadwal', [LandingController::class, 'jadwal'])->name('jadwal');
Route::get('/berita', [LandingController::class, 'showBerita'])->name('berita');
Route::view('/dokumentasi', 'landing.dokumentasi')->name('dokumentasi');
Route::view('/kontak', 'landing.kontak')->name('kontak');
Route::get('/daftar-anak', [LandingController::class, 'formDaftarAnak'])->name('daftar.anak');
Route::post('/daftar-anak', [LandingController::class, 'daftarAnak']);
Route::get('/cek-anak', [LandingController::class, 'formCekAnak'])->name('cek.anak');
Route::post('/cek-anak', [LandingController::class, 'cekAnak']);
Route::get('/statistik', [\App\Http\Controllers\StatistikController::class, 'index'])->name('statistik');

// LOGIN / LOGOUT
Route::middleware('guest')->group(function () {
    Route::get ('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});
Route::post('/logout', [AuthController::class, 'logout'])
      ->middleware('auth')
      ->name('logout');

// RUTE USER (untuk warga/ibu)
Route::prefix('user')
      ->middleware(['auth'])
      ->name('user.')
      ->group(function () {
          Route::get('/', [UserController::class, 'dashboard'])->name('dashboard');
          Route::get('/pendaftaran', [UserController::class, 'pendaftaran'])->name('pendaftaran');
          Route::post('/pendaftaran', [UserController::class, 'storePendaftaran'])->name('store-pendaftaran');
          Route::get('/status-pendaftaran', [UserController::class, 'statusPendaftaran'])->name('status-pendaftaran');
          Route::get('/detail-pendaftaran/{id}', [UserController::class, 'detailPendaftaran'])->name('detail-pendaftaran');
          Route::get('/pengaduan', [UserController::class, 'pengaduan'])->name('pengaduan');
          Route::post('/pengaduan', [UserController::class, 'storePengaduan'])->name('store-pengaduan');
          Route::get('/riwayat', [UserController::class, 'riwayat'])->name('riwayat');
          Route::get('/jadwal', [UserController::class, 'jadwal'])->name('jadwal');
          Route::get('/pengumuman', [UserController::class, 'pengumuman'])->name('pengumuman');
      });

// DASHBOARD + CRUD ADMIN (hanya untuk admin, pakai auth saja)
Route::prefix('admin')
      ->middleware(['auth'])
      ->name('admin.')
      ->group(function () {
          Route::get('/', [\App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');
          Route::resource('kader',    YuniKaderController::class);
          Route::resource('posyandu', YuniPosyanduController::class);
          Route::resource('balita',   YuniBalitaController::class)->parameters(['balita' => 'balita']);
          Route::resource('jadwal',   YuniJadwalController::class);
          Route::resource('pemeriksaan', YuniPemeriksaanController::class);
          Route::resource('berita',   YuniBeritaController::class)->parameters(['berita' => 'berita']);
          Route::resource('anak', \App\Http\Controllers\Admin\YuniAnakController::class);
          Route::resource('ibu', \App\Http\Controllers\Admin\YuniIbuController::class);
          Route::resource('lansia', \App\Http\Controllers\Admin\YuniLansiaController::class);

          // Route untuk validasi pendaftaran user
          Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran.index');
          Route::get('/pendaftaran/{id}', [PendaftaranController::class, 'show'])->name('pendaftaran.show');
          Route::patch('/pendaftaran/{id}/approve', [PendaftaranController::class, 'approve'])->name('pendaftaran.approve');
          Route::patch('/pendaftaran/{id}/reject', [PendaftaranController::class, 'reject'])->name('pendaftaran.reject');

          // Route untuk pengaduan user
          Route::resource('pengaduan', PengaduanController::class);
      });
