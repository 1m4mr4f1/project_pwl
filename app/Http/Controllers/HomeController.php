<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $dokters = Dokter::all(); // Ambil semua dokter

        // Ambil data antrian hari ini, tanpa kolom status
        $antrians = DB::table('antrian')
            ->whereDate('tanggal', Carbon::today()) // gunakan Carbon agar lebih aman
            ->select('nomor_antrian', 'nim', 'id_poli')
            ->orderBy('id_poli')
            ->get()
            ->groupBy('id_poli');

        return view('home', compact('dokters', 'antrians'));
    }
}
