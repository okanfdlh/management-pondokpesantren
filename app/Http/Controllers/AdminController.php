<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Santri; // Tambahkan model Santri
use App\Models\Violation;
use App\Models\User;
use App\Models\Achievement;
use Illuminate\Support\Facades\Validator;
use App\Models\Permission;
use App\Models\ViolationCategory;
use App\Models\ViolationDetail;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // Data Master

    // Data Santri
    public function dataSantri() {
        $santris = Santri::with('wali')->get();
        $walis = User::where('role', 'wali')->get(); // pastikan role wali
        return view('admin.santri.data-santri', compact('santris', 'walis'));
    }
    public function detailSantri($id)
    {
        $santri = Santri::with('wali', 'violations', 'achievements', 'permissions')->findOrFail($id);
        return view('admin.santri.detail-santri', compact('santri'));
    }
    
    public function tambahSantri() {
        $walis = User::where('role', 'wali')->get();
        return view('admin.santri.tambah-santri', compact('walis'));
    }
    
    public function storeSantri(Request $request) {
        $request->validate([
            'nis' => 'required|unique:santris,nis',
            'nama' => 'required',
            'asrama' => 'required',
            'kamar' => 'required',
            'kelas' => 'required',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'kelurahan' => 'required',
            'kabupaten' => 'required',
            'tahun_ajaran' => 'required',
            'status' => 'required|in:Aktif,Lulus,Cuti',
            'wali_id' => 'nullable|exists:users,id',
        ]);

        Santri::create($request->all());

        return redirect()->route('admin.santri.data-santri')->with('success', 'Santri berhasil ditambahkan!');
    }

    
    public function editSantri($id) {
        $santri = Santri::findOrFail($id);
        $walis = User::where('role', 'wali')->get();
        return view('admin.santri.edit-santri', compact('santri', 'walis'));
    }

    
    public function updateSantri(Request $request, $id) {
        $santri = Santri::findOrFail($id);

        $request->validate([
            'nis' => 'required|unique:santris,nis,' . $id,
            'nama' => 'required',
            'asrama' => 'required',
            'kamar' => 'required',
            'kelas' => 'required',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'kelurahan' => 'required',
            'kabupaten' => 'required',
            'tahun_ajaran' => 'required',
            'status' => 'required|in:Aktif,Lulus,Cuti',
            'wali_id' => 'nullable|exists:users,id',
        ]);

        $santri->update($request->all());

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
        $categories = ViolationCategory::with('details')->get();
        return view('admin.input-pelanggaran', compact('santris', 'categories'));
    }

    public function storePelanggaran(Request $request)
    {
        $request->validate([
            'santri_id' => 'required|exists:santris,id',
            'violation_detail_id' => 'nullable|exists:violation_details,id',
            'date' => 'required|date',
        ]);

        $detail = ViolationDetail::with('category')->find($request->violation_detail_id);

        Violation::create([
            'santri_id' => $request->santri_id,
            'violation_type' => $detail && $detail->category ? $detail->category->name : 'lainnya',
            'description' => $detail ? $detail->name : $request->description,
            'date' => $request->date,
            'violation_detail_id' => $request->violation_detail_id
        ]);



        return redirect()->back()->with('success', 'Pelanggaran berhasil ditambahkan!');
    }

    public function editPelanggaran($id)
    {
        $pelanggaran = Violation::with('violationDetail')->findOrFail($id);
        $santris = Santri::all();
        $categories = ViolationCategory::with('details')->get();
        return view('admin.edit-pelanggaran', compact('pelanggaran', 'santris', 'categories'));
    }


    public function updatePelanggaran(Request $request, $id)
    {
        $request->validate([
            'santri_id' => 'required|exists:santris,id',
            'violation_detail_id' => 'nullable|exists:violation_details,id',
            'date' => 'required|date',
            'description' => 'nullable|string',
            'violation_type' => 'nullable|string|max:255',
        ]);

        $pelanggaran = Violation::findOrFail($id);

        // Jika violation_detail_id diisi, ambil kategori dan nama detail
        if ($request->violation_detail_id) {
            $detail = ViolationDetail::with('category')->find($request->violation_detail_id);
            $pelanggaran->violation_detail_id = $request->violation_detail_id;
            $pelanggaran->violation_type = $detail && $detail->category ? $detail->category->name : $request->violation_type;
            $pelanggaran->description = $detail ? $detail->name : $request->description;
        } else {
            // Jika tidak ada detail, pakai data manual dari form
            $pelanggaran->violation_detail_id = null;
            $pelanggaran->violation_type = $request->violation_type;
            $pelanggaran->description = $request->description;
        }

        $pelanggaran->santri_id = $request->santri_id;
        $pelanggaran->date = $request->date;

        $pelanggaran->save();

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
        $violations = Violation::with(['santri', 'violationDetail.category'])->latest()->get();
        return view('admin.riwayat-pelanggaran', compact('violations'));
    }


    public function jenisPelanggaran()
    {
        $categories = ViolationCategory::with('details')->get();
        return view('admin.jenis-pelanggaran', compact('categories'));
    }

    public function storeJenisPelanggaran(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255',
            'name' => 'required|string|max:255',
        ]);

        $category = ViolationCategory::firstOrCreate(['name' => strtolower($request->category)]);
        ViolationDetail::create([
            'violation_category_id' => $category->id,
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Jenis pelanggaran berhasil ditambahkan.');
    }
    public function updateJenisPelanggaran(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $detail = ViolationDetail::findOrFail($id);
        $detail->name = $request->name;
        $detail->save();

        return redirect()->back()->with('success', 'Jenis pelanggaran berhasil diperbarui.');
    }

    public function deleteJenisPelanggaran($id)
    {
        $detail = ViolationDetail::findOrFail($id);
        $detail->delete();

        return redirect()->back()->with('success', 'Jenis pelanggaran berhasil dihapus.');
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
