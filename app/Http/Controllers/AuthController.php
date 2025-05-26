<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman form login.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        // Menampilkan view login (pastikan file view 'login.blade.php' ada)
        return view('login');
    }

    /**
     * Memproses permintaan login dari form login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Validasi input login agar email dan password wajib diisi
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // Ambil hanya field email dan password dari request
        $credentials = $request->only('email', 'password');

        // Proses otentikasi menggunakan kredensial
        if (Auth::attempt($credentials)) {
            // Regenerasi session untuk keamanan (mencegah session fixation)
            $request->session()->regenerate();

            // Ambil role user yang sedang login
            $role = Auth::user()->role;

            // Redirect ke dashboard sesuai role
            switch ($role) {
                case 'admin':
                    return redirect()->route('admin.dashboard'); // Pastikan route ini sudah dibuat
                case 'karyawan':
                    return redirect()->route('karyawan.dashboard'); // Pastikan route ini sudah dibuat
            }
        }

        // Jika login gagal, kembalikan ke form login dengan pesan error
        return back()->withErrors([
            'login_error' => 'Username atau password salah!',
        ]);
    }

    /**
     * Logout user dari sistem dan arahkan ke halaman utama.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        // Logout user dari sesi
        Auth::logout();

        // Redirect ke halaman utama dengan pesan sukses
        return redirect('/')->with('success', 'Anda telah logout.');
    }
}
