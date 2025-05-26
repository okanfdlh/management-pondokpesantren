<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Salary;
use App\Models\Employee;

class SalaryController extends Controller
{
    /**
     * Menampilkan daftar semua data gaji.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Ambil semua data gaji beserta data karyawan terkait
        $salaries = Salary::with('employee')->latest()->get();

        // Ambil semua karyawan untuk dropdown pencarian/filter (jika diperlukan di view)
        $employees = Employee::all();

        return view('admin.salaries.index', compact('salaries', 'employees'));
    }

    /**
     * Menampilkan form untuk input gaji baru.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Ambil semua data karyawan untuk pilihan dropdown
        $employees = Employee::all();
        return view('admin.salaries.create', compact('employees'));
    }

    /**
     * Menyimpan data gaji baru ke database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'employee_id'    => 'required|exists:employees,id',
            'amount'         => 'required|numeric|min:1',
            'payment_date'   => 'required|date',
            'payment_status' => 'required|in:pending,paid,cancelled',
        ]);

        // Simpan data gaji
        Salary::create($request->all());

        return redirect()->route('admin.salaries.index')->with('success', 'Gaji berhasil ditambahkan');
    }

    /**
     * Menampilkan form edit data gaji.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        // Ambil data gaji berdasarkan ID
        $salary = Salary::findOrFail($id);

        // Ambil semua karyawan untuk dropdown
        $employees = Employee::all();

        return view('admin.salaries.edit', compact('salary', 'employees'));
    }

    /**
     * Memperbarui data gaji yang ada.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'employee_id'    => 'required|exists:employees,id',
            'amount'         => 'required|numeric|min:0',
            'payment_date'   => 'required|date',
            'payment_status' => 'required|string|in:pending,paid,cancelled',
        ]);

        // Update data
        $salary = Salary::findOrFail($id);
        $salary->update($request->all());

        return redirect()->route('admin.salaries.index')->with('success', 'Gaji telah diperbarui.');
    }

    /**
     * Menghapus data gaji dari database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // Hapus data gaji
        $salary = Salary::findOrFail($id);
        $salary->delete();

        return redirect()->route('admin.salaries.index')->with('success', 'Gaji telah dihapus.');
    }

    /**
     * Mengunduh slip gaji dalam format PDF.
     *
     * @param  int  $salaryId
     * @return \Illuminate\Http\Response
     */
    public function downloadSalaryPdf($salaryId)
    {
        // Ambil data gaji dan karyawan terkait
        $salary = Salary::with('employee')->findOrFail($salaryId);

        // Render tampilan PDF menggunakan blade
        $pdf = Pdf::loadView('admin.salaries.pdf', compact('salary'));

        // Download file PDF
        return $pdf->download('Gaji_' . $salary->employee->name . '_' . $salary->payment_date->format('d-m-Y') . '.pdf');
    }
}
