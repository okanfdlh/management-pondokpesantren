@extends('layouts.admin')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <h1 class="text-2xl font-semibold text-teal-700 mb-6 border-b pb-2">Tambah Santri</h1>

    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-50 border border-red-400 text-red-700 rounded">
            <strong class="block mb-2">Terjadi kesalahan!</strong>
            <ul class="list-disc list-inside space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white shadow rounded-xl p-6">
    <form action="{{ route('admin.santri.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div>
                <label for="wali_id" class="block text-sm font-medium text-gray-700 mb-1">Wali Santri</label>
                <select id="wali_id" name="wali_id" 
                    class="w-full rounded-md border border-gray-300 shadow-sm focus:ring-teal-500 focus:border-teal-500 @error('wali_id') border-red-500 @enderror">
                    <option value="">-- Pilih Wali --</option>
                    @foreach($walis as $wali)
                        <option value="{{ $wali->id }}" {{ old('wali_id') == $wali->id ? 'selected' : '' }}>
                            {{ $wali->name }}
                        </option>
                    @endforeach
                </select>
                @error('wali_id')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="no_hp_walisantri" class="block text-sm font-medium text-gray-700 mb-1">No Telp Wali</label>
                <input id="no_hp_walisantri" type="text" name="no_hp_walisantri" placeholder="No Telp Wali" 
                    value="{{ old('no_hp_walisantri') }}"
                    class="w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:ring-teal-500 focus:border-teal-500 @error('no_hp_walisantri') border-red-500 @enderror">
                @error('no_hp_walisantri')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="nis" class="block text-sm font-medium text-gray-700 mb-1">NIS</label>
                <input id="nis" type="text" name="nis" placeholder="Nomor Induk Santri" 
                    value="{{ old('nis') }}"
                    class="w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:ring-teal-500 focus:border-teal-500 @error('nis') border-red-500 @enderror">
                @error('nis')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                <input id="nama" type="text" name="nama" placeholder="Nama Santri" 
                    value="{{ old('nama') }}"
                    class="w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:ring-teal-500 focus:border-teal-500 @error('nama') border-red-500 @enderror">
                @error('nama')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelamin</label>
                <select id="jenis_kelamin" name="jenis_kelamin" 
                    class="w-full rounded-md border border-gray-300 shadow-sm focus:ring-teal-500 focus:border-teal-500 @error('jenis_kelamin') border-red-500 @enderror">
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
                @error('jenis_kelamin')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Lahir</label>
                <input id="tanggal_lahir" type="date" name="tanggal_lahir" 
                    value="{{ old('tanggal_lahir') }}"
                    class="w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:ring-teal-500 focus:border-teal-500 @error('tanggal_lahir') border-red-500 @enderror">
                @error('tanggal_lahir')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="md:col-span-2">
                <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                <textarea id="alamat" name="alamat" rows="3" placeholder="Alamat lengkap"
                    class="w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:ring-teal-500 focus:border-teal-500 @error('alamat') border-red-500 @enderror">{{ old('alamat') }}</textarea>
                @error('alamat')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="asrama" class="block text-sm font-medium text-gray-700 mb-1">Asrama</label>
                <input id="asrama" type="text" name="asrama" placeholder="Nama Asrama" 
                    value="{{ old('asrama') }}"
                    class="w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:ring-teal-500 focus:border-teal-500 @error('asrama') border-red-500 @enderror">
                @error('asrama')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="kamar" class="block text-sm font-medium text-gray-700 mb-1">Kamar</label>
                <input id="kamar" type="text" name="kamar" placeholder="Nomor Kamar" 
                    value="{{ old('kamar') }}"
                    class="w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:ring-teal-500 focus:border-teal-500 @error('kamar') border-red-500 @enderror">
                @error('kamar')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="kelas" class="block text-sm font-medium text-gray-700 mb-1">Kelas</label>
                <input id="kelas" type="text" name="kelas" placeholder="Kelas Santri" 
                    value="{{ old('kelas') }}"
                    class="w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:ring-teal-500 focus:border-teal-500 @error('kelas') border-red-500 @enderror">
                @error('kelas')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="kelurahan" class="block text-sm font-medium text-gray-700 mb-1">Kelurahan</label>
                <input id="kelurahan" type="text" name="kelurahan" placeholder="Kelurahan" 
                    value="{{ old('kelurahan') }}"
                    class="w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:ring-teal-500 focus:border-teal-500 @error('kelurahan') border-red-500 @enderror">
                @error('kelurahan')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="kabupaten" class="block text-sm font-medium text-gray-700 mb-1">Kabupaten</label>
                <input id="kabupaten" type="text" name="kabupaten" placeholder="Kabupaten" 
                    value="{{ old('kabupaten') }}"
                    class="w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:ring-teal-500 focus:border-teal-500 @error('kabupaten') border-red-500 @enderror">
                @error('kabupaten')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="tahun_ajaran" class="block text-sm font-medium text-gray-700 mb-1">Tahun Ajaran</label>
                <input id="tahun_ajaran" type="text" name="tahun_ajaran" placeholder="2024/2025" 
                    value="{{ old('tahun_ajaran') }}"
                    class="w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:ring-teal-500 focus:border-teal-500 @error('tahun_ajaran') border-red-500 @enderror">
                @error('tahun_ajaran')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select id="status" name="status" 
                    class="w-full rounded-md border border-gray-300 shadow-sm focus:ring-teal-500 focus:border-teal-500 @error('status') border-red-500 @enderror">
                    <option value="">-- Pilih Status --</option>
                    <option value="Aktif" {{ old('status') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="Lulus" {{ old('status') == 'Lulus' ? 'selected' : '' }}>Lulus</option>
                    <option value="Cuti" {{ old('status') == 'Cuti' ? 'selected' : '' }}>Cuti</option>
                </select>
                @error('status')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

        </div>

        <div class="flex justify-between items-center pt-4 border-t">
            <a href="{{ route('admin.santri.data-santri') }}" 
                class="text-teal-600 hover:text-teal-800 font-semibold transition">← Kembali</a>
            <button type="submit" 
                class="bg-teal-600 text-white px-5 py-2 rounded-md hover:bg-teal-700 transition font-semibold">
                Simpan
            </button>
        </div>
    </form>
</div>
</div>
@endsection
