<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Salary;
use App\Models\Employee;

use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Menampilkan halaman dashboard admin.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        // Mengambil data karyawan berdasarkan ID user yang sedang login
        $employee = Employee::find(auth()->user()->id); // Pastikan ID user sama dengan ID di tabel employee
        
        // Menampilkan halaman dashboard dengan data employee
        return view('admin.dashboard', compact('employee'));
    }

    // =====================
    // == Data Master Area ==
    // =====================



    /**
     * Menampilkan halaman profil admin.
     *
     * @return \Illuminate\View\View
     */
    public function profil()
    {
        // Menampilkan view profil admin (tanpa data dinamis)
        return view('admin.profil');
    }
}
