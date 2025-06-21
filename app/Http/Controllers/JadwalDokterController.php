<?php

namespace App\Http\Controllers;

use App\Models\JadwalDokter;
use App\Models\Dokter;
use Illuminate\Http\Request;

class JadwalDokterController extends Controller
{
    public function index()
    {
        $jadwals = JadwalDokter::with('dokter.poli')->get();
        return view('admin.jadwal.index', compact('jadwals'));
    }

    public function create()
    {
        $dokters = Dokter::with('poli')->get();
        return view('admin.jadwal.create', compact('dokters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_dokter' => 'required|exists:dokter,id_dokter',
            'hari_jaga' => 'required',
            'jam' => 'required'
        ]);

        JadwalDokter::create($request->all());
        return redirect()->route('jadwal.index')->with('success', 'Jadwal dokter berhasil ditambahkan');
    }

    public function edit($id)
    {
        $jadwal = JadwalDokter::findOrFail($id);
        $dokters = Dokter::with('poli')->get();
        return view('admin.jadwal.edit', compact('jadwal', 'dokters'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_dokter' => 'required|exists:dokter,id_dokter',
            'hari_jaga' => 'required',
            'jam' => 'required'
        ]);

        $jadwal = JadwalDokter::findOrFail($id);
        $jadwal->update($request->all());

        return redirect()->route('jadwal.index')->with('success', 'Jadwal dokter berhasil diperbarui');
    }

    public function destroy($id)
    {
        $jadwal = JadwalDokter::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('jadwal.index')->with('success', 'Jadwal dokter berhasil dihapus');
    }
}
