<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PoliklinikController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AntrianController;
use App\Http\Controllers\AntrianAdminController;
use App\Http\Controllers\JadwalDokterController;
use App\Http\Controllers\JadwalDokterAdminController;


// =======================
// Halaman Umum
// =======================

// Home (menampilkan dokter, antrian, dsb)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Antrian (halaman umum antrian hari ini)
Route::get('/antrian', [AntrianController::class, 'index'])->name('antrian');

// Formulir Daftar Pasien
Route::get('/FormulirDaftar', function () {
    return view('FormulirDaftar');
});

// Tentang Kami
Route::get('/AboutUs', function () {
    return view('components.AboutUs');
});

// =======================
// Autentikasi
// =======================

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// =======================
// Admin Dashboard
// =======================

Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

// Manajemen Dokter
Route::get('/admin/dokter', [DokterController::class, 'index'])->name('dokter.index');
Route::post('/admin/dokter', [DokterController::class, 'store'])->name('dokter.store');
Route::get('/admin/dokter/{id}/edit', [DokterController::class, 'edit'])->name('dokter.edit');
Route::put('/admin/dokter/{id}', [DokterController::class, 'update'])->name('dokter.update');
Route::delete('/admin/dokter/{id}', [DokterController::class, 'destroy'])->name('dokter.destroy');

// Manajemen Antrian (khusus admin)
Route::delete('/admin/antrian/{id}', [AntrianAdminController::class, 'destroy'])->name('admin.antrian.destroy');

// =======================
// Mahasiswa
// =======================

// Operasi CRUD eksplisit
Route::post('/mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
Route::put('/mahasiswa/{nim}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
Route::delete('/mahasiswa/{nim}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');

// Resource Route (otomatis semua CRUD)
Route::resource('mahasiswa', MahasiswaController::class);

// =======================
// Pendaftaran ke Poliklinik
// =======================

Route::get('/pendaftaran', [PoliklinikController::class, 'showForm']);
Route::post('/pendaftaran', [PoliklinikController::class, 'processForm'])->name('pendaftaran.submit');





// Admin - Antrian Hari Ini
Route::get('/admin/antrian', [AntrianAdminController::class, 'index'])->name('admin.antrian');
Route::delete('/admin/antrian/{nomor_antrian}', [AntrianAdminController::class, 'destroy'])->name('admin.antrian.destroy');


// Manajemen Jadwal Dokter


Route::get('/admin/jadwal', [JadwalDokterController::class, 'index'])->name('jadwal.index');
Route::get('/admin/jadwal/create', [JadwalDokterController::class, 'create'])->name('jadwal.create');
Route::post('/admin/jadwal', [JadwalDokterController::class, 'store'])->name('jadwal.store');
Route::get('/admin/jadwal/{id}/edit', [JadwalDokterController::class, 'edit'])->name('jadwal.edit');
Route::put('/admin/jadwal/{id}', [JadwalDokterController::class, 'update'])->name('jadwal.update');
Route::delete('/admin/jadwal/{id}', [JadwalDokterController::class, 'destroy'])->name('jadwal.destroy');

// Manajemen Jadwal Dokter
Route::get('/admin/jadwal-dokter', [\App\Http\Controllers\Admin\JadwalDokterController::class, 'index'])->name('admin.jadwal.index');
Route::post('/admin/jadwal-dokter', [\App\Http\Controllers\Admin\JadwalDokterController::class, 'store'])->name('admin.jadwal.store');
Route::delete('/admin/jadwal-dokter/{id}', [\App\Http\Controllers\Admin\JadwalDokterController::class, 'destroy'])->name('admin.jadwal.destroy');

// Manajemen Jadwal Dokter di dashboard


Route::post('/admin/jadwal', [JadwalDokterAdminController::class, 'store'])->name('admin.jadwal.store');
Route::delete('/admin/jadwal/{id}', [JadwalDokterAdminController::class, 'destroy'])->name('admin.jadwal.destroy');


