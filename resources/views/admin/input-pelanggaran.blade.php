@extends('layouts.admin')

@section('content')
<main class="p-6 md:p-8 max-w-full">
    <h2 class="text-2xl md:text-3xl font-bold mb-6 text-gray-800 border-b border-gray-200 pb-3">Tambah Pelanggaran Santri</h2>

    @if (session('success'))
        <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-lg mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow rounded-xl p-6">
        <form action="{{ route('admin.store-pelanggaran') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="santri_id" class="block text-sm font-medium text-gray-700 mb-1">Santri</label>
                <select name="santri_id" id="santri_id" required
                        class="w-full border border-gray-300 rounded-lg focus:ring-[#009688] focus:border-[#009688] p-2.5">
                    <option value="">-- Pilih Santri --</option>
                    @foreach ($santris as $santri)
                        <option value="{{ $santri->id }}" {{ old('santri_id') == $santri->id ? 'selected' : '' }}>
                            {{ $santri->nama }}
                        </option>
                    @endforeach
                </select>
                @error('santri_id')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="violation_detail_id" class="block text-sm font-medium text-gray-700 mb-1">Detail Pelanggaran</label>
                <select name="violation_detail_id" id="violation_detail_id" required
                        class="w-full border border-gray-300 rounded-lg focus:ring-[#009688] focus:border-[#009688] p-2.5">
                    <option value="">-- Pilih Pelanggaran --</option>
                    @foreach ($categories as $category)
                        <optgroup label="{{ ucfirst($category->name) }}">
                            @foreach ($category->details as $detail)
                                <option value="{{ $detail->id }}">{{ $detail->name }}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
                @error('violation_detail_id')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi (Opsional)</label>
                <textarea name="description" id="description" rows="3"
                          class="w-full border border-gray-300 rounded-lg focus:ring-[#009688] focus:border-[#009688] p-2.5">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="date" class="block text-sm font-medium text-gray-700 mb-1">Tanggal</label>
                <input type="date" name="date" id="date" value="{{ old('date') }}"
                       class="w-full border border-gray-300 rounded-lg focus:ring-[#009688] focus:border-[#009688] p-2.5">
                @error('date')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="text-right">
                <button type="submit"
                        class="inline-flex items-center bg-[#009688] hover:bg-[#00796B] text-white font-semibold px-6 py-2 rounded-lg shadow-sm transition duration-150">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</main>
@endsection
