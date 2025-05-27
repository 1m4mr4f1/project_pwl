<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswa',
            'nama' => 'required',
            'prodi' => 'required',
            'status_aktif' => 'required|boolean'
        ]);

        Mahasiswa::create($request->all());

        return redirect()->route('admin.dashboard')->with('success', 'Mahasiswa berhasil ditambahkan');
    }

    public function update(Request $request, $nim)
    {
        $request->validate([
            'nama' => 'required',
            'prodi' => 'required',
            'status_aktif' => 'required|boolean'
        ]);

        Mahasiswa::where('nim', $nim)->update($request->only(['nama', 'prodi', 'status_aktif']));

        return redirect()->route('admin.dashboard')->with('success', 'Mahasiswa berhasil diupdate');
    }

    public function destroy($nim)
    {
        Mahasiswa::where('nim', $nim)->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Mahasiswa berhasil dihapus');
    }
}

