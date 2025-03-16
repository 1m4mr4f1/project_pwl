<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Home');
});

Route::get('/FormulirDaftar', function () {
    return view('FormulirDaftar');
});
