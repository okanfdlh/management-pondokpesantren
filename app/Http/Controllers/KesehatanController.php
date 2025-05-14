<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Santri;
use App\Models\RekamMedis;

class KesehatanController extends Controller
{
    public function index()
    {
        return view('kesehatan.dashboard');
    }
    public function dashboard() {
        return view('kesehatan.dashboard');
    }
    
    public function dataSantri() {
        $santris = Santri::all();
        return view('kesehatan.data-santri', compact('santris'));
    }
    
    // Rekam Medis
    public function tambahRekamMedis() {
        $santris = Santri::all();
        return view('kesehatan.tambah-rekam-medis', compact('santris'));
    }

    public function storeRekamMedis(Request $request)
    {
        $request -> validate([
            'santri_id'=>'required|exists:santris,id',
            'tanggal_kunjungan'=>'required|date',
            'keluhan'=>'required|string|max:255',
            'diagnosis'=>'required|string|max:255',
            'tindakan'=>'required|string|max:255',
        ]);
        
        RekamMedis::create($request->all());
        return redirect()->back()->with('success', 'Data Rekam Medis berhasil ditambahkan');
    }



    public function riwayatKesehatan() {
        return view('kesehatan.riwayat-kesehatan');
    }






    
    public function ajukanPerpulangan() {
        return view('kesehatan.ajukan-perpulangan');
    }
    
    public function statusPengajuan() {
        return view('kesehatan.status-pengajuan');
    }
    
    public function profil() {
        return view('kesehatan.profil');
    }
    
}

