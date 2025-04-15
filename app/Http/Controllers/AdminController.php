<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Menampilkan halaman dashboard admin
    public function index()
    {
        // Cek apakah admin sudah login
        if (!session('admin')) {
            return redirect()->route('login');
        }

        // Tampilkan halaman dashboard
        return view('admin.dashboard');
    }
}
