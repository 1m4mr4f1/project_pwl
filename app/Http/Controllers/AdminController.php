<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class AdminController extends Controller
{
    // Menampilkan halaman dashboard admin
    public function index()
    {
        if (!session('admin')) {
            return redirect()->route('login');
        }

        $mahasiswa = Mahasiswa::all();
        return view('admin.dashboard', compact('mahasiswa'));
    }

    // Jika nanti ingin halaman khusus kelola mahasiswa
    public function kelolaMahasiswa()
    {
        $mahasiswa = Mahasiswa::all();
        return view('admin.kelola-mahasiswa', compact('mahasiswa'));
    }
}
