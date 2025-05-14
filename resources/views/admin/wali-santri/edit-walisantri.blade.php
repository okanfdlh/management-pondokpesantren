@extends('layouts.admin')

@section('content')
<div class="p-6 max-w-3xl mx-auto">
    <h1 class="text-xl font-bold mb-4">Edit Data Santri</h1>

    <form action="{{ route('admin.santri.update', $santri->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block font-medium mb-1">NIS</label>
                <input type="text" name="nis" value="{{ old('nis', $santri->nis) }}" class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block font-medium mb-1">Nama Lengkap</label>
                <input type="text" name="nama" value="{{ old('nama', $santri->nama) }}" class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block font-medium mb-1">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="w-full border rounded px-3 py-2">
                    <option value="L" {{ old('jenis_kelamin', $santri->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ old('jenis_kelamin', $santri->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <div>
                <label class="block font-medium mb-1">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $santri->tanggal_lahir) }}" class="w-full border rounded px-3 py-2">
            </div>

            <div class="md:col-span-2">
                <label class="block font-medium mb-1">Alamat</label>
                <textarea name="alamat" class="w-full border rounded px-3 py-2" rows="3">{{ old('alamat', $santri->alamat) }}</textarea>
            </div>

            <div>
                <label class="block font-medium mb-1">Foto</label>
                <input type="file" name="foto" class="w-full border rounded px-3 py-2">
                @if ($santri->foto)
                    <img src="{{ asset('storage/' . $santri->foto) }}" class="mt-2 w-20 h-20 object-cover rounded-full" />
                @endif
            </div>

            <div>
                <label class="block font-medium mb-1">Tahun Ajaran</label>
                <input type="text" name="tahun_ajaran" value="{{ old('tahun_ajaran', $santri->tahun_ajaran) }}" class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block font-medium mb-1">Status</label>
                <select name="status" class="w-full border rounded px-3 py-2">
                    <option value="Aktif" {{ old('status', $santri->status) == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="Lulus" {{ old('status', $santri->status) == 'Lulus' ? 'selected' : '' }}>Lulus</option>
                    <option value="Cuti" {{ old('status', $santri->status) == 'Cuti' ? 'selected' : '' }}>Cuti</option>
                </select>
            </div>
        </div>

        <div class="mt-6 flex justify-end space-x-3">
            <a href="{{ route('admin.santri.data-santri') }}" class="text-gray-600 hover:underline">Batal</a>
            <button type="submit" class="bg-teal-600 text-white px-4 py-2 rounded hover:bg-teal-700">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection