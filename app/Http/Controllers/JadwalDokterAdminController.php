<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalDokter;
use App\Models\Dokter;
use App\Models\Mahasiswa;
use App\Models\Poli;
use Illuminate\Support\Facades\DB;

class JadwalDokterAdminController extends Controller
{
    /**
     * Tampilkan dashboard admin dengan data termasuk jadwal dokter.
     */
    public function index()
    {
        // Cek login admin
        if (!session('admin')) {
            return redirect()->route('login');
        }

        $dokters = Dokter::all();
        $jadwals = JadwalDokter::with('dokter.poli')->get();
        $mahasiswa = Mahasiswa::all();
        $polis = Poli::all();

        // Antrian hari ini
        $antrians = DB::table('antrian')
            ->whereDate('tanggal', today())
            ->select('nomor_antrian', 'nim', 'id_poli')
            ->orderBy('id_poli')
            ->get();

        return view('admin.dashboard', compact('dokters', 'jadwals', 'mahasiswa', 'polis', 'antrians'));
    }

    /**
     * Simpan jadwal dokter baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_dokter' => 'required|exists:dokter,id_dokter',
            'hari_jaga' => 'required|string|max:100',
            'jam' => 'required|string|max:50',
        ]);

        JadwalDokter::create([
            'id_dokter' => $request->id_dokter,
            'hari_jaga' => $request->hari_jaga,
            'jam' => $request->jam,
        ]);

        return redirect()->back()->with('success', 'Jadwal dokter berhasil ditambahkan.');
    }

    /**
     * Hapus jadwal dokter.
     */
    public function destroy($id)
    {
        $jadwal = JadwalDokter::findOrFail($id);
        $jadwal->delete();

        return redirect()->back()->with('success', 'Jadwal dokter berhasil dihapus.');
    }
}
