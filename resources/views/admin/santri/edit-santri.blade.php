@extends('layouts.admin')

@section('content')
<div class="p-6 max-w-3xl mx-auto">
    <h1 class="text-xl font-bold mb-4">Edit Data Santri</h1>

    <form action="{{ route('admin.santri.update', $santri->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block font-medium mb-1">Wali Santri</label>
                <select name="wali_id" class="w-full border rounded px-3 py-2 @error('wali_id') border-red-500 @enderror">
                    <option value="">Pilih Wali</option>
                    @foreach($walis as $wali)
                        <option value="{{ $wali->id }}" {{ old('wali_id', $santri->wali_id) == $wali->id ? 'selected' : '' }}>
                            {{ $wali->name }}
                        </option>
                    @endforeach
                </select>
                @error('wali_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block font-medium mb-1">NIS</label>
                <input type="text" name="nis" value="{{ old('nis', $santri->nis) }}" class="w-full border rounded px-3 py-2 @error('nis') border-red-500 @enderror">
                @error('nis')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block font-medium mb-1">Nama Lengkap</label>
                <input type="text" name="nama" value="{{ old('nama', $santri->nama) }}" class="w-full border rounded px-3 py-2 @error('nama') border-red-500 @enderror">
                @error('nama')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block font-medium mb-1">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="w-full border rounded px-3 py-2 @error('jenis_kelamin') border-red-500 @enderror">
                    <option value="L" {{ old('jenis_kelamin', $santri->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ old('jenis_kelamin', $santri->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
                @error('jenis_kelamin')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block font-medium mb-1">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $santri->tanggal_lahir) }}" class="w-full border rounded px-3 py-2 @error('tanggal_lahir') border-red-500 @enderror">
                @error('tanggal_lahir')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="md:col-span-2">
                <label class="block font-medium mb-1">Alamat</label>
                <textarea name="alamat" class="w-full border rounded px-3 py-2 @error('alamat') border-red-500 @enderror" rows="3">{{ old('alamat', $santri->alamat) }}</textarea>
                @error('alamat')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block font-medium mb-1">Asrama</label>
                <input type="text" name="asrama" value="{{ old('asrama', $santri->asrama) }}" class="w-full border rounded px-3 py-2 @error('asrama') border-red-500 @enderror">
                @error('asrama')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block font-medium mb-1">Kamar</label>
                <input type="text" name="kamar" value="{{ old('kamar', $santri->kamar) }}" class="w-full border rounded px-3 py-2 @error('kamar') border-red-500 @enderror">
                @error('kamar')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block font-medium mb-1">Kelas</label>
                <input type="text" name="kelas" value="{{ old('kelas', $santri->kelas) }}" class="w-full border rounded px-3 py-2 @error('kelas') border-red-500 @enderror">
                @error('kelas')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block font-medium mb-1">Kelurahan</label>
                <input type="text" name="kelurahan" value="{{ old('kelurahan', $santri->kelurahan) }}" class="w-full border rounded px-3 py-2 @error('kelurahan') border-red-500 @enderror">
                @error('kelurahan')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block font-medium mb-1">Kabupaten</label>
                <input type="text" name="kabupaten" value="{{ old('kabupaten', $santri->kabupaten) }}" class="w-full border rounded px-3 py-2 @error('kabupaten') border-red-500 @enderror">
                @error('kabupaten')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block font-medium mb-1">Tahun Ajaran</label>
                <input type="text" name="tahun_ajaran" value="{{ old('tahun_ajaran', $santri->tahun_ajaran) }}" class="w-full border rounded px-3 py-2 @error('tahun_ajaran') border-red-500 @enderror">
                @error('tahun_ajaran')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block font-medium mb-1">Status</label>
                <select name="status" class="w-full border rounded px-3 py-2 @error('status') border-red-500 @enderror">
                    <option value="Aktif" {{ old('status', $santri->status) == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="Lulus" {{ old('status', $santri->status) == 'Lulus' ? 'selected' : '' }}>Lulus</option>
                    <option value="Cuti" {{ old('status', $santri->status) == 'Cuti' ? 'selected' : '' }}>Cuti</option>
                </select>
                @error('status')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mt-6 flex justify-end space-x-3">
            <a href="{{ route('admin.santri.data-santri') }}" class="text-gray-600 hover:underline">Batal</a>
            <button type="submit" class="bg-teal-600 text-white px-4 py-2 rounded hover:bg-teal-700">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection
