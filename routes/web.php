<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WaliController;
use App\Http\Controllers\KesehatanController;

// Halaman Home
Route::get('/', function () {
    return view('home');
})->name('home');

// Halaman Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Hanya bisa diakses saat sudah login
Route::middleware(['auth'])->group(function () {

    // ------------------ ADMIN ------------------
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        
        // Data Master

        // Santri
        Route::get('/santri/data-santri', [AdminController::class, 'dataSantri'])->name('admin.santri.data-santri');
        Route::get('/santri/tambah-santri', [AdminController::class, 'tambahSantri'])->name('admin.santri.tambah-santri');
        Route::get('/santri/{id}/detail', [AdminController::class, 'detailSantri'])->name('admin.santri.detail-santri');
        Route::post('/santri', [AdminController::class, 'storeSantri'])->name('admin.santri.store');
        Route::get('/santri/edit-santri/{id}', [AdminController::class, 'editSantri'])->name('admin.santri.edit-santri');
        Route::put('/santri/{id}', [AdminController::class, 'updateSantri'])->name('admin.santri.update');
        Route::delete('/santri/{id}', [AdminController::class, 'deleteSantri'])->name('admin.santri.destroy');
            
        // Wali Santri
        Route::get('/wali-santri/data-walisantri', [AdminController::class, 'dataWaliSantri'])->name('admin.wali-santri.data-santri');
        Route::get('/wali-santri/tambah-walisantri', [AdminController::class, 'tambahWaliSantri'])->name('admin.wali-santri.tambah-walisantri');
        Route::post('/wali-walisantri', [AdminController::class, 'storeWaliSantri'])->name('admin.wali-santri.store');
        Route::get('/wali-santri/edit-walisantri/{id}', [AdminController::class, 'editWaliSantri'])->name('admin.wali-santri.edit-walisantri');
        Route::put('/wali-santri/{id}', [AdminController::class, 'updateWaliSantri'])->name('admin.wali-santri.update');
        Route::delete('/wali-santri/{id}', [AdminController::class, 'deleteWaliSantri'])->name('admin.wali-santri.destroy');

        // Violation
        Route::get('/input-pelanggaran', [AdminController::class, 'inputPelanggaran'])->name('admin.input-pelanggaran');
        Route::post('/store-pelanggaran', [AdminController::class, 'storePelanggaran'])->name('admin.store-pelanggaran');
        Route::get('/riwayat-pelanggaran', [AdminController::class, 'riwayatPelanggaran'])->name('admin.riwayat-pelanggaran');
        Route::get('/pelanggaran/{id}/edit', [AdminController::class, 'editPelanggaran'])->name('admin.edit-pelanggaran');
        Route::put('/pelanggaran/{id}', [AdminController::class, 'updatePelanggaran'])->name('admin.update-pelanggaran');
        Route::delete('/pelanggaran/{id}', [AdminController::class, 'deletePelanggaran'])->name('admin.delete-pelanggaran');
        // Route::get('/admin/jenis-pelanggaran', [AdminController::class, 'jenisPelanggaran'])->name('admin.jenis-pelanggaran');
        Route::post('/jenis-pelanggaran', [AdminController::class, 'storeJenisPelanggaran'])->name('admin.jenis-pelanggaran.store');
        Route::get('/jenis-pelanggaran', [AdminController::class, 'jenisPelanggaran'])->name('admin.jenis-pelanggaran');
        // Jenis pelanggaran
        Route::put('/jenis-pelanggaran/{id}', [AdminController::class, 'updateJenisPelanggaran'])->name('admin.jenis-pelanggaran.update');
        Route::delete('/jenis-pelanggaran/{id}', [AdminController::class, 'deleteJenisPelanggaran'])->name('admin.jenis-pelanggaran.delete');



        // Achievement
        // Route::get('/jenis-prestasi', [AdminController::class, 'jenisPrestasi']);
        Route::get('/input-prestasi', [AdminController::class, 'inputPrestasi'])->name('admin.input-prestasi');
        Route::get('/riwayat-prestasi', [AdminController::class, 'riwayatPrestasi'])->name('admin.riwayat-prestasi');
        Route::post('/store-prestasi', [AdminController::class, 'storePrestasi'])->name('admin.store-prestasi');
        Route::get('/prestasi/{id}/edit', [AdminController::class, 'editPrestasi'])->name('admin.edit-prestasi');
        Route::put('/prestasi/{id}', [AdminController::class, 'updatePrestasi'])->name('admin.update-prestasi');
        Route::delete('/prestasi/{id}', [AdminController::class, 'deletePrestasi'])->name('admin.delete-prestasi');
        
        Route::get('/data-wali', [AdminController::class, 'dataWali']);
        Route::get('/pengajuan-masuk', [AdminController::class, 'pengajuanMasuk']);
        Route::get('/riwayat-perizinan', [AdminController::class, 'riwayatPerizinan']);
        Route::get('/riwayat-kesehatan', [AdminController::class, 'riwayatKesehatan']);
        Route::get('/pengajuan-perpulangan', [AdminController::class, 'pengajuanPerpulangan']);
        Route::get('/riwayat-perpulangan', [AdminController::class, 'riwayatPerpulangan']);
        Route::get('/profil', [AdminController::class, 'profil']);
      // Tampilkan halaman pengajuan
        Route::get('/pengajuan-masuk', [AdminController::class, 'pengajuanMasuk'])->name('admin.pengajuan-masuk');

        // Update status pengajuan
        Route::put('/pengajuan-masuk/{id}/update-status', [AdminController::class, 'updateStatusPerizinan'])->name('admin.update-status-perizinan');

    });

    // ------------------ KESEHATAN ------------------
    Route::prefix('kesehatan')->group(function () {
        Route::get('/dashboard', [KesehatanController::class, 'dashboard'])->name('kesehatan.dashboard');
        Route::get('/data-santri', [KesehatanController::class, 'dataSantri'])->name('kesehatan.data-santri');
        
        Route::get('/tambah-rekam-medis', [KesehatanController::class, 'tambahRekamMedis'])->name('kesehatan.tambah-rekam-medis');
        Route::post('/store-RekamMedis', [KesehatanController::class, 'storeRekamMedis'])->name('kesehatan.storeRekamMedis');
        Route::get('/riwayat-kesehatan', [KesehatanController::class, 'riwayatKesehatan'])->name('kesehatan.riwayat-kesehatan');
        
        Route::get('/ajukan-perpulangan', [KesehatanController::class, 'ajukanPerpulangan'])->name('kesehatan.ajukan-perpulangan');
        Route::get('/status-pengajuan', [KesehatanController::class, 'statusPengajuan'])->name('kesehatan.status-pengajuan');
    
        Route::get('/profil', [KesehatanController::class, 'profil'])->name('kesehatan.profil');
    });

    // ------------------ WALI SANTRI ------------------
    Route::prefix('wali')->group(function () {
    Route::get('/dashboard', [WaliController::class, 'index'])->name('wali.dashboard');
    Route::get('/ajukan-perpulangan', [WaliController::class, 'ajukanPerpulangan'])->name('wali.perizinan.form');
    Route::post('/ajukan-perpulangan', [WaliController::class, 'storePerizinan'])->name('wali.perizinan.store');
    Route::get('/histori-perizinan', [WaliController::class, 'historiPerizinan'])->name('wali.perizinan.histori');
    
    // Add route for showing a specific permission's detail
    Route::get('/perizinan/{id}', [WaliController::class, 'showPermission'])->name('wali.perizinan.show');
});

});
