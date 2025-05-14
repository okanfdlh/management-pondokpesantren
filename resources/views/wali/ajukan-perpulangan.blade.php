@extends('layouts.wali')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow mt-6">

    <!-- Tombol Back -->
    <div class="mb-4">
        <a href="{{ route('wali.dashboard') }}" class="inline-flex items-center text-sm text-gray-600 hover:text-purple-600 transition">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
            </svg>
            Kembali ke Dashboard
        </a>
    </div>

    <h2 class="text-2xl font-bold text-gray-800 mb-6">Ajukan Perizinan Pulang</h2>

    @if(session('success'))
        <div class="mb-4 bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('wali.perizinan.store') }}" method="POST" class="space-y-5">
        @csrf

        <div>
            <label for="santri_id" class="block font-medium text-gray-700 mb-1">Santri</label>
            <select name="santri_id" id="santri_id" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-purple-500 focus:border-purple-500" required>
                <option value="">-- Pilih Santri --</option>
                @foreach($santris as $santri)
                    <option value="{{ $santri->id }}">{{ $santri->nama }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="kategori_perizinan" class="block font-medium text-gray-700 mb-1">Kategori Perizinan</label>
            <select name="kategori_perizinan" id="kategori_perizinan" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-purple-500 focus:border-purple-500" required>
                <option value="">-- Pilih Kategori --</option>
                <option value="Meninggal">Meninggal</option>
                <option value="Sakit">Sakit</option>
                <option value="Haji/Umroh">Haji/Umroh</option>
                <option value="Menikah">Menikah</option>
                <option value="Aqiqah/Khitanan">Aqiqah/Khitanan</option>
                <option value="Wisuda">Wisuda</option>
                <option value="Tugas/Kegiatan">Tugas/Kegiatan</option>
            </select>
        </div>

        <div>
            <label for="reason" class="block font-medium text-gray-700 mb-1">Alasan</label>
            <textarea name="reason" id="reason" rows="3" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-purple-500 focus:border-purple-500" required></textarea>
        </div>

        <div>
            <label for="request_date" class="block font-medium text-gray-700 mb-1">Tanggal Pengajuan</label>
            <input type="date" name="request_date" id="request_date" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-purple-500 focus:border-purple-500" required>
        </div>
        <div>
            <label for="tanggal_selesai" class="block font-medium text-gray-700 mb-1">Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-purple-500 focus:border-purple-500" required>
        </div>

        <div class="text-right">
            <button type="submit" class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700 transition">
                Ajukan
            </button>
        </div>
    </form>
</div>
@endsection
