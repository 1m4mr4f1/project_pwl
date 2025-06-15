<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;
use App\Models\Poli;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Storage;

class DokterController extends Controller
{
    // Tampilkan daftar dokter dan form tambah
    public function index()
    {
        $dokters = Dokter::with('poli')->get();
        $polis = Poli::all();
         $mahasiswa = Mahasiswa::all(); 

        return view('admin.dashboard', [
            'dokters' => $dokters,
            'polis' => $polis,
            'mahasiswa' => $mahasiswa,
            'mode' => 'create',    // untuk membedakan form tambah/edit
            'dokter' => null       // kosong untuk mode create
        ]);
    }

    // Tampilkan form edit
    public function edit($id)
    {
        $dokters = Dokter::with('poli')->get();
        $polis = Poli::all();
        $dokter = Dokter::findOrFail($id);

        return view('admin.dashboard', [
            'dokters' => $dokters,
            'polis' => $polis,
            'mode' => 'edit',
            'dokter' => $dokter
        ]);
    }

    // Simpan dokter baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'spesialis' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'id_poli' => 'required|exists:poli,id_poli',
 // varchar di DB
            'foto' => 'nullable|image|max:2048',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('dokter', 'public');
        }

        Dokter::create([
            'nama' => $request->nama,
            'spesialis' => $request->spesialis,
            'deskripsi' => $request->deskripsi,
            'id_poli' => $request->id_poli,
            'foto' => $fotoPath,
        ]);

        return redirect()->route('dokter.index')->with('success', 'Dokter berhasil ditambahkan.');
    }

    // Perbarui data dokter
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'spesialis' => 'required|string|max:100',
            'deskripsi' => 'required|string',
           'id_poli' => 'required|exists:poli,id_poli',

            'foto' => 'nullable|image|max:2048',
        ]);

        $dokter = Dokter::findOrFail($id);

        if ($request->hasFile('foto')) {
            if ($dokter->foto && Storage::disk('public')->exists($dokter->foto)) {
                Storage::disk('public')->delete($dokter->foto);
            }
            $dokter->foto = $request->file('foto')->store('dokter', 'public');
        }

        $dokter->update([
            'nama' => $request->nama,
            'spesialis' => $request->spesialis,
            'deskripsi' => $request->deskripsi,
            'id_poli' => $request->id_poli,
            'foto' => $dokter->foto,
        ]);

        return redirect()->route('dokter.index')->with('success', 'Dokter berhasil diperbarui.');
    }

    // Hapus dokter
    public function destroy($id)
    {
        $dokter = Dokter::findOrFail($id);

        if ($dokter->foto && Storage::disk('public')->exists($dokter->foto)) {
            Storage::disk('public')->delete($dokter->foto);
        }

        $dokter->delete();

        return redirect()->route('dokter.index')->with('success', 'Dokter berhasil dihapus.');
    }
}
