<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/**
 * -----------------------------------------
 * Rute Otentikasi
 * -----------------------------------------
 */

// Halaman login untuk user (GET)
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');

// Proses login (POST)
Route::post('/', [AuthController::class, 'login']);

// Proses logout (POST)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


/**
 * -----------------------------------------
 * Rute Khusus Admin (dalam prefix 'admin')
 * Semua rute di bawah hanya bisa diakses setelah login (biasanya dibungkus middleware auth)
 * -----------------------------------------
 */
Route::prefix('admin')->group(function () {

    /**
     * Dashboard Admin
     * GET /admin/dashboard
     */
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    /**
     * CRUD Data Karyawan
     * Resource controller:
     * - index:   GET /admin/karyawan
     * - create:  GET /admin/karyawan/create
     * - store:   POST /admin/karyawan
     * - show:    GET /admin/karyawan/{id}
     * - edit:    GET /admin/karyawan/{id}/edit
     * - update:  PUT /admin/karyawan/{id}
     * - destroy: DELETE /admin/karyawan/{id}
     */
    Route::resource('karyawan', EmployeeController::class)->names('admin.karyawan');

    /**
     * Histori Gaji Karyawan
     * GET /admin/karyawan/{employee}/gaji
     */
    Route::get('/admin/karyawan/{employee}/gaji', [EmployeeController::class, 'salaryHistory'])->name('admin.karyawan.gaji');

    /**
     * CRUD Data Gaji
     * Resource controller:
     * - index:   GET /admin/salaries
     * - create:  GET /admin/salaries/create
     * - store:   POST /admin/salaries
     * - show:    GET /admin/salaries/{id}
     * - edit:    GET /admin/salaries/{id}/edit
     * - update:  PUT /admin/salaries/{id}
     * - destroy: DELETE /admin/salaries/{id}
     */
    Route::resource('salaries', SalaryController::class)->names('admin.salaries');

    /**
     * Download Slip Gaji PDF
     * GET /admin/salaries/{salary}/download
     */
    Route::get('admin/salaries/{salary}/download', [SalaryController::class, 'downloadSalaryPdf'])->name('admin.salaries.download');
});
