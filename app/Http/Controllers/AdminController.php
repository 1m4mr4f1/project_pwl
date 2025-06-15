<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Dokter;
use App\Models\Poli;


class AdminController extends Controller
{
    // Menampilkan halaman dashboard admin
    public function index()
    {
       if (!session('admin')) {
        return redirect()->route('login');
    }

    $dokters = Dokter::all();
    $mahasiswa = Mahasiswa::all();
    $polis = Poli::all(); // Ambil semua data poli

    return view('admin.dashboard', compact('mahasiswa', 'dokters', 'polis'));
    }

    // Jika nanti ingin halaman khusus kelola mahasiswa
    public function kelolaMahasiswa()
    {
        $mahasiswa = Mahasiswa::all();
        return view('admin.dashboard', compact('mahasiswa'));
    }
}
