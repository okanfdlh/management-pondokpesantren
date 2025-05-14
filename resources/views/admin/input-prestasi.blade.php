@extends('layouts.admin')

@section('content')
<div class="container mx-auto max-w-md bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4">Tambah Prestasi Santri</h1>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.store-prestasi') }}" method="POST">
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
            <label for="achievement_type" class="block font-semibold">Jenis Prestasi</label>
            <input type="text" name="achievement_type" id="achievement_type" value="{{ old('achievement_type') }}"
                class="w-full border rounded p-2">
            @error('achievement_type')
                <div class="text-red-600 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block font-semibold">Deskripsi (Opsional)</label>
            <textarea name="description" id="description" rows="3"
                class="w-full border rounded p-2">{{ old('description') }}</textarea>
            @error('description')
                <div class="text-red-600 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="date" class="block font-semibold">Tanggal</label>
            <input type="date" name="date" id="date" value="{{ old('date') }}"
                class="w-full border rounded p-2">
            @error('date')
                <div class="text-red-600 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Simpan
        </button>
    </form>
</div>
@endsection

