@extends('layouts.kesehatan')

@section('content')

<div class="p-6 bg-gray-50 min-h-screen">
    <h1 class="text-2xl font-bold mb-6 text-gray-700">Tambah Rekam Medis</h1>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    
    <form action="{{ route('kesehatan.storeRekamMedis') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="santri_id" class="block font-semibold">Santri</label>
            <select name="santri_id" id="santri_id" class="w-full border rounded p-2">
                <option value="">-- Pilih Santri --</option>
                @foreach ($santris as $santri)
                    <option value="{{ $santri->id }}" {{ old('santri_id') == $santri->id ? 'selected' : '' }}>
                        {{ $santri->nama }}
                    </option>
                @endforeach
            </select>
            @error('santri_id')
                <div class="text-red-600 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="keluhan" class="block font-semibold">Keluhan</label>
            <textarea name="keluhan" id="keluhan" rows="3"
                class="w-full border rounded p-2">{{ old('keluhan') }}</textarea>
            @error('keluhan')
                <div class="text-red-600 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="diagnosis" class="block font-semibold">Diagnosis</label>
            <textarea name="diagnosis" id="diagnosis" rows="3"
                class="w-full border rounded p-2">{{ old('diagnosis') }}</textarea>
            @error('diagnosis')
                <div class="text-red-600 text-sm">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-4">
            <label for="tindakan" class="block font-semibold">Tindakan</label>
            <textarea name="tindakan" id="tindakan" rows="3"
                class="w-full border rounded p-2">{{ old('tindakan') }}</textarea>
            @error('tindakan')
                <div class="text-red-600 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="tanggal_kunjungan" class="block font-semibold">Tanggal Kunjungan</label>
            <input type="date" name="tanggal_kunjungan" id="tanggal_kunjungan" value="{{ old('tanggal_kunjungan') }}"
                class="w-full border rounded p-2">
            @error('tanggal_kunjungan')
                <div class="text-red-600 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="bg-teal-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Simpan
        </button>
    </form>
</div>
@endsection


