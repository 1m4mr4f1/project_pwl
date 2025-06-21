<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JadwalDokter;
use App\Models\Dokter;

class JadwalDokterController extends Controller
{
    public function index()
    {
        $jadwals = JadwalDokter::with('dokter')->get();
        $dokters = \App\Models\Dokter::all();
        return view('admin.jadwal_dokter', compact('jadwals', 'dokters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_dokter' => 'required|exists:dokter,id_dokter',
            'hari_jaga' => 'required|string',
            'jam' => 'required|string',
        ]);

        JadwalDokter::create($request->all());
        return redirect()->back()->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        JadwalDokter::destroy($id);
        return redirect()->back()->with('success', 'Jadwal berhasil dihapus.');
    }
}

