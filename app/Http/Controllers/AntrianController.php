<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AntrianController extends Controller
{
    public function index()
    {
        // Ambil data dokter jika diperlukan oleh Home.blade.php
        $dokters = DB::table('dokters')->get();

        // Ambil antrian berdasarkan tanggal hari ini
        $tanggalHariIni = Carbon::today()->toDateString();

        $antrians = DB::table('antrian')
            ->where('tanggal', $tanggalHariIni)
            ->select('id_poli', 'nomor_antrian', 'nim')
            ->get()
            ->groupBy('id_poli');

        return view('Home', compact('dokters', 'antrians'));
    }
}

