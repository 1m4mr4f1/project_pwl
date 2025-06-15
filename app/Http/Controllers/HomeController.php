<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;

class HomeController extends Controller
{
    public function index()
    {
        $dokters = \App\Models\Dokter::all(); // Ambil semua dokter
        return view('home', compact('dokters'));
    }
}

