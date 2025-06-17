<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Dokter;
use App\Models\Poli;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    // Menampilkan halaman dashboard admin
    public function index()
    {
        // Jika belum login sebagai admin, redirect ke halaman login
        if (!session('admin')) {
            return redirect()->route('login');
        }

        // Ambil data dari database
        $dokters = Dokter::all();
        $mahasiswa = Mahasiswa::all();
        $polis = Poli::all();

        // Ambil data antrian hari ini dari tabel antrian
        $antrians = DB::table('antrian')
            ->whereDate('tanggal', today())
            ->select('nomor_antrian', 'nim', 'id_poli')
            ->orderBy('id_poli')
            ->get();


        return view('admin.dashboard', compact('mahasiswa', 'dokters', 'polis', 'antrians'));
    }

    // Jika nanti ingin halaman khusus kelola mahasiswa
    public function kelolaMahasiswa()
    {
        $mahasiswa = Mahasiswa::all();
        return view('admin.dashboard', compact('mahasiswa'));
    }
}
