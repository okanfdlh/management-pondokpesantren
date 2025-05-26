<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('login'); // Ganti sesuai lokasi view login kamu
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Dapatkan role user yang login
            $role = Auth::user()->role;

            // Redirect berdasarkan role
            if ($role === 'admin') {
                return redirect()->intended('/admin/dashboard');
            } elseif ($role === 'kesehatan') {
                return redirect()->intended('/kesehatan/dashboard');
            } elseif ($role === 'wali') {
                return redirect()->intended('/wali/dashboard');
            } else {
                return redirect()->intended('/');
            }
        }

        return back()->withErrors(['login_error' => 'Username atau password salah!']);
    }

    // Proses logout
    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Anda telah logout.');
    }
}
