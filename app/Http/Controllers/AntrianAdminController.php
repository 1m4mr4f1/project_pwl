<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class AntrianAdminController extends Controller
{
    /**
     * Menampilkan data antrian hari ini untuk admin.
     */
    public function index()
    {
        $antrians = DB::table('antrian')
            ->whereDate('tanggal', Carbon::today())
            ->orderBy('id_poli')
            ->get();

        return view('admin.dashboard', compact('antrians'));
    }

    /**
     * Hapus data antrian berdasarkan nomor_antrian.
     */
    public function destroy($nomor_antrian)
    {
        DB::table('antrian')
            ->where('nomor_antrian', $nomor_antrian)
            ->whereDate('tanggal', Carbon::today())
            ->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Data antrian berhasil dihapus.');
    }
}
