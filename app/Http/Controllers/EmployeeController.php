<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Menampilkan daftar seluruh karyawan.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Mengambil semua data karyawan beserta relasi user dan gajinya, diurutkan dari yang terbaru
        $employees = Employee::with('user', 'salaries')->latest()->get();
        
        return view('admin.karyawan.index', compact('employees'));
    }

    /**
     * Menampilkan form untuk menambahkan karyawan baru.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Mengambil semua user untuk ditampilkan pada pilihan saat membuat karyawan
        $users = User::all();
        return view('admin.karyawan.create', compact('users'));
    }

    /**
     * Menyimpan data karyawan baru ke database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validasi input form
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:employees,email',
            'phone'    => 'required|string|max:20',
            'position' => 'required|string|max:100',
            'user_id'  => 'required|exists:users,id'
        ]);

        // Simpan data karyawan
        Employee::create($request->all());

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('admin.karyawan.index')->with('success', 'Data karyawan berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail dari satu karyawan berdasarkan ID.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // Ambil data karyawan beserta data user-nya
        $employee = Employee::with('user')->findOrFail($id);
        return view('admin.karyawan.show', compact('employee'));
    }

    /**
     * Menampilkan form untuk mengedit data karyawan.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        // Ambil data karyawan yang akan diedit
        $employee = Employee::findOrFail($id);

        // Ambil semua user untuk pilihan dropdown
        $users = User::all();

        return view('admin.karyawan.edit', compact('employee', 'users'));
    }

    /**
     * Menyimpan perubahan pada data karyawan.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // Validasi input dengan pengecualian email saat update
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:employees,email,' . $id,
            'phone'    => 'required|string|max:20',
            'position' => 'required|string|max:100',
            'user_id'  => 'required|exists:users,id'
        ]);

        // Ambil data karyawan dan update
        $employee = Employee::findOrFail($id);
        $employee->update($request->all());

        return redirect()->route('admin.karyawan.index')->with('success', 'Data karyawan berhasil diperbarui.');
    }

    /**
     * Menghapus data karyawan dari database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // Cari dan hapus data karyawan
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('admin.karyawan.index')->with('success', 'Data karyawan berhasil dihapus.');
    }

    /**
     * Menampilkan riwayat gaji dari seorang karyawan.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\View\View
     */
    public function salaryHistory(Employee $employee)
    {
        // Mengambil data semua gaji yang terkait dengan karyawan ini
        $salaries = $employee->salaries;

        return view('admin.salary_history', compact('employee', 'salaries'));
    }
}
