<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Santri; // Tambahkan model Santri
use App\Models\Violation;
use App\Models\User;
use App\Models\Achievement;
use Illuminate\Support\Facades\Validator;
use App\Models\Permission;



class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // Data Master

    // Data Santri
    public function dataSantri() {
        $santris = Santri::all();
        return view('admin.santri.data-santri', compact('santris'));
    }
    
    public function tambahSantri() {
        return view('admin.santri.tambah-santri');
    }
    
    public function storeSantri(Request $request) {
        $request->validate([
            'nis' => 'required|unique:santris,nis',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'tahun_ajaran' => 'required',
            'status' => 'required',
            'foto' => 'nullable|image|max:2048',
        ]);
    
        $data = $request->all();
        
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto-santri', 'public');
        }
    
        Santri::create($data);
    
        return redirect()->route('admin.santri.data-santri')->with('success', 'Santri berhasil ditambahkan!');
    }
    
    public function editSantri($id) {
        $santri = Santri::findOrFail($id);
        return view('admin.santri.edit-santri', compact('santri'));
    }
    
    public function updateSantri(Request $request, $id) {
        $santri = Santri::findOrFail($id);
    
        $request->validate([
            'nis' => 'required|unique:santris,nis,' . $id,
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'tahun_ajaran' => 'required',
            'status' => 'required',
            'foto' => 'nullable|image|max:2048',
        ]);
    
        $data = $request->all();
    
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto-santri', 'public');
        }
    
        $santri->update($data);
    
        return redirect()->route('admin.santri.data-santri')->with('success', 'Data santri diperbarui.');
    }
    
    public function deleteSantri($id) {
        $santri = Santri::findOrFail($id);
        $santri->delete();
    
        return redirect()->route('admin.santri.data-santri')->with('success', 'Data santri dihapus.');
    }

    // Data Wali Santri
    public function dataWali()
    {
        $users = User::where('role', 'wali')->get(); // filter hanya wali
        return view('admin.wali-santri.data-walisantri', compact('users'));
    }

    public function tambahWaliSantri() {
        return view('admin.wali-santri.tambah-walisantri');
    }
    
    public function storeWaliSantri(Request $request) {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' =>'required',
        ]);
    
        $data = $request->all();
        $data['role'] = 'wali'; // Set default role
        $data['password'] = bcrypt($request->password);
    
        User::create($data);
        return redirect()->route('admin.wali-santri.data-walisantri')->with('success', 'Wali Santri berhasil ditambahkan!');
    }
    
    public function editWaliSantri($id) {
        $users = User::findOrFail($id);
        return view('admin.wali-santri.edit-walisantri', compact('users'));
    }
    
    public function updateWaliSantri(Request $request, $id) {
        $users = User::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            // 'password' =>'required',
        ]);
        $data = $request->all();
        $data['role'] = 'wali'; // Set default role
        $data['password'] = bcrypt($request->password);
        $users->update($data);
        return redirect()->route('admin.wali-santri.data-walisantri')->with('success', 'Data wali santri diperbarui.');
    }
    
    public function deleteWaliSantri($id) {
        $users = User::findOrFail($id);
        $users->delete();
    
        return redirect()->route('admin.wali-santri.data-walisantri')->with('success', 'Data Wali santri dihapus.');
    }

    // Pelanggaran
    public function inputPelanggaran()
    {
        $santris = Santri::all();
        return view('admin.input-pelanggaran', compact('santris'));
    }

    public function storePelanggaran(Request $request)
    {
        $request->validate([
            'santri_id' => 'required|exists:santris,id',
            'violation_type' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
        ]);

        Violation::create($request->all());

        return redirect()->back()->with('success', 'Pelanggaran berhasil ditambahkan!');
    }

    public function editPelanggaran($id)
    {
        $pelanggaran = Violation::findOrFail($id);
        $santris = Santri::all();
        return view('admin.edit-pelanggaran', compact('pelanggaran', 'santris'));
    }

    public function updatePelanggaran(Request $request, $id)
    {
        $request->validate([
            'santri_id' => 'required|exists:santris,id',
            'violation_type' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
        ]);

        $pelanggaran = Violation::findOrFail($id);
        $pelanggaran->update($request->all());

        return redirect()->route('admin.riwayat-pelanggaran')->with('success', 'Data pelanggaran berhasil diperbarui.');
    }

    public function deletePelanggaran($id)
    {
        $pelanggaran = Violation::findOrFail($id);
        $pelanggaran->delete();

    return redirect()->route('admin.riwayat-pelanggaran')->with('success', 'Data pelanggaran berhasil dihapus.');
    }

    public function riwayatPelanggaran()
    {
        $violations = Violation::with('santri')->latest()->get();
        return view('admin.riwayat-pelanggaran', compact('violations'));
    }


    // Prestasi
    // public function jenisPrestasi()
    // {
    //     return view('admin.jenis-prestasi');
    // }

    public function inputPrestasi()
    {
        $santris = Santri::all();
        return view('admin.input-prestasi', compact('santris'));
    }

    public function storePrestasi(Request $request)
    {
        $request->validate([
            'santri_id' => 'required|exists:santris,id',
            'achievement_type' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
        ]);
        Achievement::create($request->all());
        return redirect() ->back() ->with('success', 'Prestasi berhasil ditambahkan');
    }

    public function editPrestasi($id)
    {
        $achievements=Achievement::findOrFail($id);
        $santris = Santri::all();
        return view('admin.edit-prestasi', compact('achievements', 'santris'));
    }
    
    public function updatePrestasi(Request $request, $id)
    {
        $request->validate([
            'santri_id' => 'required|exists:santris,id',
            'achievement_type' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
        ]);
        $achievements = Achievement::findOrFail($id);
        $achievements->update($request->all());
        return redirect()->route('admin.riwayat-prestasi')->with('success', 'Data Prestasi berhasil diperbarui');
    }

    public function riwayatPrestasi()
    {
        $achievements = Achievement::with('santri')->latest()->get();
        return view('admin.riwayat-prestasi', compact('achievements'));
    }
    
    public function deletePrestasi($id)
    {
        $achievements = Achievement::findOrFail($id);
        $achievements -> delete();
        return redirect()->route('admin.riwayat-prestasi')-> with('sucess', 'Data prestasi berhasil dihapus');
    }








    // Perizinan
    
public function pengajuanMasuk()
{
    $permissions = Permission::with('santri')->orderBy('created_at', 'desc')->get();
    return view('admin.pengajuan-masuk', compact('permissions'));
}

public function updateStatusPerizinan(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:Diizinkan,Ditolak',
    ]);

    $permission = Permission::findOrFail($id);
    $permission->status = $request->status;
    $permission->save();

    return redirect()->route('admin.pengajuan-masuk')->with('success', 'Status perizinan berhasil diperbarui.');
}


    public function riwayatPerizinan()
    {
        return view('admin.riwayat-perizinan');
    }

    // Kesehatan
    public function riwayatKesehatan()
    {
        return view('admin.riwayat-kesehatan');
    }

    // Perpulangan
    public function pengajuanPerpulangan()
    {
        return view('admin.pengajuan-perpulangan');
    }

    public function riwayatPerpulangan()
    {
        return view('admin.riwayat-perpulangan');
    }

    // Profil
    public function profil()
    {
        return view('admin.profil');
    }
}
