<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PoliklinikController extends Controller
{
    public function showForm()
    {
        return view('FormulirDaftar');
    }

    public function processForm(Request $request)
    {
        $request->validate([
            'nim' => 'required|string|max:20',
            'name' => 'required|string|max:100',
            'poli' => 'required|string',
        ]);

        $nim = $request->input('nim');

        // Cek apakah nim ada di tabel mahasiswa
        $mahasiswa = DB::table('mahasiswa')->where('nim', $nim)->first();

        if (!$mahasiswa) {
            return back()->withErrors(['nim' => 'NIM tidak ditemukan di data mahasiswa'])->withInput();
        }

        // Cek apakah sudah daftar hari ini di poli yang sama
        $existing = DB::table('antrian')
            ->where('nim', $nim)
            ->where('tanggal', date('Y-m-d'))
            ->where('id_poli', $request->input('poli'))
            ->first();

        if ($existing) {
            return back()->withErrors(['nim' => 'Anda sudah terdaftar hari ini di poli tersebut'])->withInput();
        }

        // Generate nomor antrian (misal nomor_antrian urut per poli per hari)
        $lastNumber = DB::table('antrian')
            ->where('id_poli', $request->input('poli'))
            ->where('tanggal', date('Y-m-d'))
            ->max('nomor_antrian');

        $nextNumber = $lastNumber ? intval($lastNumber) + 1 : 1;
        $nomorAntrian = str_pad($nextNumber, 3, '0', STR_PAD_LEFT); // contoh format 001, 002, dst

        // Simpan ke tabel antrian
        DB::table('antrian')->insert([
            'id_poli' => $request->input('poli'),
            'nomor_antrian' => $nomorAntrian,
            'tanggal' => date('Y-m-d'),
            'nim' => $nim,
        ]);

        return redirect('/pendaftaran')->with('success', 'Pendaftaran berhasil! Nomor antrian Anda: ' . $nomorAntrian);
    }
}
