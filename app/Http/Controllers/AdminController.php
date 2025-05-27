<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa; // ✅ Tambahkan ini

class AdminController extends Controller
{
    // Menampilkan halaman dashboard admin
    public function index()
    {
        // Cek apakah admin sudah login
        if (!session('admin')) {
            return redirect()->route('login');
        }

        // Tampilkan halaman dashboard
        return view('admin.dashboard');
    }

    // Menampilkan daftar mahasiswa dari tabel
    public function kelolaMahasiswa()
    {
        $mahasiswa = Mahasiswa::all();
        return view('admin.kelola-mahasiswa', compact('mahasiswa'));
    }
}
