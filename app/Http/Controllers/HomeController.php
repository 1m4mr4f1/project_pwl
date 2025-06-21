<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;
use App\Models\JadwalDokter;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $dokters = Dokter::with('poli')->get();

        $jadwals = JadwalDokter::with('dokter.poli')->get();

        $antrians = DB::table('antrian')
            ->whereDate('tanggal', Carbon::today())
            ->select('nomor_antrian', 'nim', 'id_poli')
            ->orderBy('id_poli')
            ->get()
            ->groupBy('id_poli');

        return view('home', compact('dokters', 'jadwals', 'antrians'));
    }
}
