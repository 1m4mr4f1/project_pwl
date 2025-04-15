<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('auth.login.index');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Cek apakah admin dengan username yang diberikan ada
        $admin = Admin::where('username', $request->username)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            // Set session atau Auth
            session(['admin' => $admin]);
            return redirect()->route('admin.dashboard');
        }

        // Jika login gagal, kembali ke halaman login dengan pesan error
        return back()->with('error', 'Username atau password salah.');
    }

    // Menampilkan halaman registrasi
    public function showRegisterForm()
    {
        return view('auth.register.index');
    }

    // Proses registrasi
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string|max:255|unique:admin',
            'email' => 'required|email|unique:admin',
            'password' => 'required|string|min:8|confirmed', // password harus terkonfirmasi
        ]);

        // Membuat instance Admin baru
        $admin = new Admin();
        $admin->username = $request->username;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password); // Mengenkripsi password
        $admin->save();

        // Redirect ke halaman login setelah berhasil registrasi
        return redirect()->route('login')->with('success', 'Admin registered successfully!');
    }

    // Logout admin
    public function logout()
    {
        session()->forget('admin');
        return redirect()->route('login');
    }
}
