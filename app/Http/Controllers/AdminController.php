<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Dokter;
use App\Models\Poli;
use App\Models\JadwalDokter;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    // Menampilkan halaman dashboard admin
    public function index()
    {
        // Cek apakah sudah login sebagai admin
        if (!session('admin')) {
            return redirect()->route('login');
        }

        // Ambil data dari semua tabel yang dibutuhkan
        $dokters   = Dokter::all();
        $mahasiswa = Mahasiswa::all();
        $polis     = Poli::all();
        $jadwals   = JadwalDokter::with('dokter.poli')->get();

        // Ambil data antrian hari ini
        $antrians = DB::table('antrian')
            ->whereDate('tanggal', today())
            ->select('nomor_antrian', 'nim', 'id_poli')
            ->orderBy('id_poli')
            ->get();

        // Kirim semua data ke dashboard view
        return view('admin.dashboard', compact(
            'dokters',
            'mahasiswa',
            'polis',
            'antrians',
            'jadwals'
        ));
    }

    // Halaman khusus untuk kelola mahasiswa (opsional)
    public function kelolaMahasiswa()
    {
        $mahasiswa = Mahasiswa::all();
        return view('admin.dashboard', compact('mahasiswa'));
    }
}
