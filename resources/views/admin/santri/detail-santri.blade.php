@extends('layouts.admin')

@section('content')
<div class="p-6 bg-white rounded-md shadow-md">
    <h1 class="text-2xl font-semibold mb-4">Detail Santri - {{ $santri->nama }}</h1>
    <a href="{{ route('admin.santri.data-santri') }}" class="mb-6 inline-block text-blue-600 hover:underline">← Kembali ke Data Santri</a>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div><strong>NIS:</strong> {{ $santri->nis }}</div>
        <div><strong>Nama:</strong> {{ $santri->nama }}</div>
        <div><strong>Asrama:</strong> {{ $santri->asrama }}</div>
        <div><strong>Kamar:</strong> {{ $santri->kamar }}</div>
        <div><strong>Kelas:</strong> {{ $santri->kelas }}</div>
        <div><strong>Jenis Kelamin:</strong> {{ $santri->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</div>
        <div><strong>Tanggal Lahir:</strong> {{ \Carbon\Carbon::parse($santri->tanggal_lahir)->format('d M Y') }}</div>
        <div><strong>Alamat:</strong> {{ $santri->alamat }}, {{ $santri->kelurahan }}, {{ $santri->kabupaten }}</div>
        <div><strong>Tahun Ajaran:</strong> {{ $santri->tahun_ajaran }}</div>
        <div><strong>Status:</strong> {{ $santri->status }}</div>
        <div><strong>Wali Santri:</strong> {{ $santri->wali?->name ?? '-' }}</div>
    </div>

    {{-- Kamu bisa tambahkan data relasi lain misalnya violations, achievements, permissions, repatriations --}}
    <div class="mt-6">
        <h2 class="text-xl font-semibold mb-2">Data Pelanggaran</h2>
        @if($santri->violations->isEmpty())
            <p>Tidak ada pelanggaran.</p>
        @else
            <ul class="list-disc list-inside">
                @foreach($santri->violations as $violation)
                    <li>{{ $violation->description }} ({{ $violation->date }})</li>
                @endforeach
            </ul>
        @endif
    </div>

    {{-- Tambah section lain sesuai kebutuhan --}}
</div>
@endsection
