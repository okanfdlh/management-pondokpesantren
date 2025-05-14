@extends('layouts.wali')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow mt-6">

    <h2 class="text-2xl font-bold text-gray-800 mb-6">Detail Perizinan</h2>

    <div class="space-y-4">
        <div><strong>Santri:</strong> {{ $permission->santri->nama }}</div>
        <div><strong>Kategori Perizinan:</strong> {{ $permission->kategori_perizinan }}</div>
        <div><strong>Alasan:</strong> {{ $permission->reason }}</div>
        <div><strong>Tanggal Pengajuan:</strong> {{ $permission->request_date }}</div>
        <div><strong>Status:</strong> {{ $permission->status }}</div>
    </div>

    <div class="mt-4">
        <a href="{{ route('wali.perizinan.histori') }}" class="inline-block px-4 py-2 bg-purple-600 text-white rounded hover:bg-purple-700 transition">
            Kembali ke Riwayat
        </a>
    </div>

</div>
@endsection
