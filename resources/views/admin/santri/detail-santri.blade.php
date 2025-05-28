@extends('layouts.admin')

@section('content')
<div class="p-6 bg-white rounded-xl shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-700">
            Detail Santri - {{ $santri->nama }}
        </h1>
        <a href="{{ route('admin.santri.data-santri') }}"
           class="text-sm text-blue-600 hover:text-blue-800 flex items-center gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15 19l-7-7 7-7" />
            </svg>
            Kembali
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm text-gray-700">
        <div><span class="font-semibold">NIS:</span> {{ $santri->nis }}</div>
        <div><span class="font-semibold">Nama:</span> {{ $santri->nama }}</div>
        <div><span class="font-semibold">Asrama:</span> {{ $santri->asrama }}</div>
        <div><span class="font-semibold">Kamar:</span> {{ $santri->kamar }}</div>
        <div><span class="font-semibold">Kelas:</span> {{ $santri->kelas }}</div>
        <div><span class="font-semibold">Jenis Kelamin:</span> {{ $santri->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</div>
        <div><span class="font-semibold">Tanggal Lahir:</span> {{ \Carbon\Carbon::parse($santri->tanggal_lahir)->format('d M Y') }}</div>
        <div><span class="font-semibold">Alamat:</span> {{ $santri->alamat }}, {{ $santri->kelurahan }}, {{ $santri->kabupaten }}</div>
        <div><span class="font-semibold">Tahun Ajaran:</span> {{ $santri->tahun_ajaran }}</div>
        <div>
            <span class="font-semibold">Status:</span>
            <span class="ml-2 inline-block px-3 py-1 text-xs font-semibold rounded-full
                @if($santri->status === 'Aktif') bg-green-200 text-green-800
                @elseif($santri->status === 'Lulus') bg-blue-200 text-blue-800
                @else bg-yellow-200 text-yellow-800
                @endif">
                {{ $santri->status }}
            </span>
        </div>
        <div><span class="font-semibold">Wali Santri:</span> {{ $santri->wali?->name ?? '-' }}</div>
        <div><span class="font-semibold">No Telp Wali:</span> {{ $santri->no_hp_walisantri}}</div>
    </div>

    {{-- Pelanggaran --}}
    <div class="mt-8">
        <h2 class="text-lg font-semibold mb-3 border-b pb-1 text-gray-800">Data Pelanggaran</h2>
        @if($santri->violations->isEmpty())
            <p class="text-gray-500 italic">Tidak ada pelanggaran.</p>
        @else
            <ul class="list-disc list-inside space-y-1 text-sm text-gray-700">
                @foreach($santri->violations as $violation)
                    <li>
                        {{ $violation->description }}
                        <span class="text-gray-500 text-xs">({{ \Carbon\Carbon::parse($violation->date)->format('d M Y') }})</span>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    {{-- Tempat untuk data lain --}}
    {{-- Contoh:
        - Prestasi
        - Izin
        - Riwayat Kesehatan
    --}}
</div>
@endsection
