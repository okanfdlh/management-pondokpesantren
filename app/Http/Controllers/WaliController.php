<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Santri;
use Illuminate\Http\Request;

class WaliController extends Controller
{
    public function index()
    {
        return view('wali.dashboard');
    }

    public function dashboard() {
        return view('wali.dashboard');
    }

    public function ajukanPerpulangan()
    {
        $santris = Santri::all(); // Asumsikan wali bisa memilih santri
        return view('wali.ajukan-perpulangan', compact('santris'));
    }

    public function storePerizinan(Request $request)
    {
        $request->validate([
            'santri_id' => 'required|exists:santris,id',
            'kategori_perizinan' => 'required|in:Meninggal,Sakit,Haji/Umroh,Menikah,Aqiqah/Khitanan,Wisuda,Tugas/Kegiatan',
            'reason' => 'required|string',
            'request_date' => 'required|date',
            // 'tanggal_selesai' => 'required|date',
        ]);

        Permission::create([
            'santri_id' => $request->santri_id,
            'status' => 'Diproses',
            'kategori_perizinan' => $request->kategori_perizinan,
            'reason' => $request->reason,
            'request_date' => $request->request_date,
            // 'tanggal_selesai' => $request->tanggal_selesai,
        ]);

        return redirect()->route('wali.perizinan.form')->with('success', 'Pengajuan berhasil dikirim.');
    }
    public function historiPerizinan()
    {
        $permissions = Permission::with('santri')->get(); // Mengambil semua data perizinan bersama dengan data santri
        return view('wali.histori-perizinan', compact('permissions'));
    }
    public function showPermission($id)
    {
        $permission = Permission::with('santri')->findOrFail($id);
        return view('wali.show-perizinan', compact('permission'));
    }

}
