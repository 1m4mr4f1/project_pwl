<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MahasiswaController;

Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/', function () {
    return view('Home');
});

Route::get('/FormulirDaftar', function () {
    return view('FormulirDaftar');
});

Route::get('/AboutUs', function () {
    return view('components.AboutUs');
});
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
Route::put('/mahasiswa/{nim}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
Route::delete('/mahasiswa/{nim}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');


Route::resource('mahasiswa', App\Http\Controllers\MahasiswaController::class);



