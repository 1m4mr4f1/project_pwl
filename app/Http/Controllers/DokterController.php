<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;
use Illuminate\Support\Facades\Storage;

class DokterController extends Controller
{
    public function index()
    {
        $dokters = Dokter::all();
        return view('admin.dokter', compact('dokters'));
    }

    public function store(Request $request)
    {
        // validasi dan simpan dokter seperti kode kamu sebelumnya
    }

    public function update(Request $request, $id)
    {
        // update dokter seperti kode kamu sebelumnya
    }

    public function destroy($id)
    {
        // hapus dokter seperti kode kamu sebelumnya
    }
}

