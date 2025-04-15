<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

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



