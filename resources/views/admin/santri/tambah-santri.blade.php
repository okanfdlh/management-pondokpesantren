@extends('layouts.admin')

@section('content')
<div class="p-6 max-w-3xl mx-auto">
    <h1 class="text-xl font-bold mb-4">Tambah Santri</h1>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <strong>Terjadi kesalahan!</strong>
            <ul class="mt-2 list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.santri.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block font-medium mb-1">Wali Santri</label>
                <select name="wali_id" class="w-full border rounded px-3 py-2 @error('user_id') border-red-500 @enderror">
                    <option value="">Pilih Wali</option>
                    @foreach($walis as $wali)
                        <option value="{{ $wali->id }}" {{ old('user_id') == $wali->id ? 'selected' : '' }}>{{ $wali->name }}</option>
                    @endforeach
                </select>
                @error('user_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block font-medium mb-1">NIS</label>
                <input type="text" name="nis" class="w-full border rounded px-3 py-2 @error('nis') border-red-500 @enderror" value="{{ old('nis') }}" placeholder="Nomor Induk Santri">
                @error('nis')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block font-medium mb-1">Nama Lengkap</label>
                <input type="text" name="nama" class="w-full border rounded px-3 py-2 @error('nama') border-red-500 @enderror" value="{{ old('nama') }}" placeholder="Nama Santri">
                @error('nama')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block font-medium mb-1">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="w-full border rounded px-3 py-2 @error('jenis_kelamin') border-red-500 @enderror">
                    <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
                @error('jenis_kelamin')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block font-medium mb-1">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="w-full border rounded px-3 py-2 @error('tanggal_lahir') border-red-500 @enderror" value="{{ old('tanggal_lahir') }}">
                @error('tanggal_lahir')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="md:col-span-2">
                <label class="block font-medium mb-1">Alamat</label>
                <textarea name="alamat" class="w-full border rounded px-3 py-2 @error('alamat') border-red-500 @enderror" rows="3" placeholder="Alamat lengkap">{{ old('alamat') }}</textarea>
                @error('alamat')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block font-medium mb-1">Asrama</label>
                <input type="text" name="asrama" class="w-full border rounded px-3 py-2 @error('asrama') border-red-500 @enderror" value="{{ old('asrama') }}" placeholder="Nama Asrama">
                @error('asrama')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
                </div>

                <div>
                    <label class="block font-medium mb-1">Kamar</label>
                    <input type="text" name="kamar" class="w-full border rounded px-3 py-2 @error('kamar') border-red-500 @enderror" value="{{ old('kamar') }}" placeholder="Nomor Kamar">
                    @error('kamar')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block font-medium mb-1">Kelas</label>
                    <input type="text" name="kelas" class="w-full border rounded px-3 py-2 @error('kelas') border-red-500 @enderror" value="{{ old('kelas') }}" placeholder="Kelas Santri">
                    @error('kelas')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block font-medium mb-1">Kelurahan</label>
                    <input type="text" name="kelurahan" class="w-full border rounded px-3 py-2 @error('kelurahan') border-red-500 @enderror" value="{{ old('kelurahan') }}" placeholder="Kelurahan">
                    @error('kelurahan')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block font-medium mb-1">Kabupaten</label>
                    <input type="text" name="kabupaten" class="w-full border rounded px-3 py-2 @error('kabupaten') border-red-500 @enderror" value="{{ old('kabupaten') }}" placeholder="Kabupaten">
                    @error('kabupaten')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>


            <div>
                <label class="block font-medium mb-1">Tahun Ajaran</label>
                <input type="text" name="tahun_ajaran" class="w-full border rounded px-3 py-2 @error('tahun_ajaran') border-red-500 @enderror" placeholder="2024/2025" value="{{ old('tahun_ajaran') }}">
                @error('tahun_ajaran')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block font-medium mb-1">Status</label>
                <select name="status" class="w-full border rounded px-3 py-2 @error('status') border-red-500 @enderror">
                    <option value="Aktif" {{ old('status') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="Lulus" {{ old('status') == 'Lulus' ? 'selected' : '' }}>Lulus</option>
                    <option value="Cuti" {{ old('status') == 'Cuti' ? 'selected' : '' }}>Cuti</option>
                </select>
                @error('status')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

        </div>

        <div class="mt-6 flex justify-end space-x-3">
            <a href="{{ route('admin.santri.data-santri') }}" class="text-gray-600 hover:underline">Kembali</a>
            <button type="submit" class="bg-teal-600 text-white px-4 py-2 rounded hover:bg-teal-700">Simpan</button>
        </div>
    </form>
</div>
@endsection
