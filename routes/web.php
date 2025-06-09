<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PoliklinikController;

// Dashboard Admin
Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

// Halaman Utama
Route::get('/', function () {
    return view('Home');
});

// Halaman Formulir Pendaftaran
Route::get('/FormulirDaftar', function () {
    return view('FormulirDaftar');
});

// Halaman Tentang Kami
Route::get('/AboutUs', function () {
    return view('components.AboutUs');
});

// Autentikasi: Register & Login
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Mahasiswa - Operasi CRUD eksplisit
Route::post('/mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
Route::put('/mahasiswa/{nim}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
Route::delete('/mahasiswa/{nim}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');

// Mahasiswa - Resource route (otomatis menyertakan semua metode CRUD)
Route::resource('mahasiswa', MahasiswaController::class);

// Poliklinik - Formulir pendaftaran
Route::get('/pendaftaran', [PoliklinikController::class, 'showForm']);
Route::post('/pendaftaran', [PoliklinikController::class, 'processForm'])->name('pendaftaran.submit');
