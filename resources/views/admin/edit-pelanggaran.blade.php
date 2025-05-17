@extends('layouts.admin')

@section('content')
<div class="container mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4">Edit Pelanggaran</h1>

    <form action="{{ route('admin.update-pelanggaran', $pelanggaran->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="santri_id" class="block text-sm font-medium">Santri</label>
            <select name="santri_id" class="w-full border rounded p-2">
                @foreach ($santris as $santri)
                    <option value="{{ $santri->id }}" {{ $pelanggaran->santri_id == $santri->id ? 'selected' : '' }}>
                        {{ $santri->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
        <label for="violation_detail_id" class="block text-sm font-medium">Kategori Pelanggaran</label>
        <select name="violation_detail_id" id="violation_detail_id" class="w-full border rounded p-2">
            <option value="">-- Pilih Kategori Pelanggaran --</option>
            @foreach ($categories as $category)
                <optgroup label="{{ $category->name }}">
                    @foreach ($category->details as $detail)
                        <option value="{{ $detail->id }}"
                            {{ $pelanggaran->violation_detail_id == $detail->id ? 'selected' : '' }}>
                            {{ $detail->name }}
                        </option>
                    @endforeach
                </optgroup>
            @endforeach
        </select>
    </div>


        <div class="mb-4">
            <label for="description" class="block text-sm font-medium">Deskripsi Tambahan (opsional)</label>
            <textarea name="description" class="w-full border rounded p-2">{{ $pelanggaran->description }}</textarea>
        </div>

        <div class="mb-4">
            <label for="date" class="block text-sm font-medium">Tanggal</label>
            <input type="date" name="date" value="{{ $pelanggaran->date }}" class="w-full border rounded p-2">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
    </form>
</div>
@endsection
