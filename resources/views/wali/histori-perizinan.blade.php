@extends('layouts.wali')

@section('content')
<div class="max-w-5xl mx-auto mt-6 bg-white shadow rounded-lg p-6">

    <h2 class="text-2xl font-bold mb-4 text-gray-800">Riwayat Perizinan Santri</h2>

    @if($permissions->isEmpty())
        <p class="text-gray-500">Belum ada data perizinan.</p>
    @else
        <div class="space-y-4">
            @foreach($permissions as $permission)
                <div class="border-l-4 border-purple-600 bg-gray-50 p-4 rounded shadow hover:bg-purple-50 transition">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">{{ $permission->santri->nama }}</h3>
                            <p class="text-sm text-gray-600">Kategori: {{ $permission->kategori_perizinan }}</p>
                            <p class="text-sm text-gray-600">Alasan: {{ $permission->reason }}</p>
                            <p class="text-sm text-gray-600">Tanggal Pengajuan: {{ $permission->request_date }}</p>
                            <p class="text-sm text-gray-600">Status: 
                                <span class="font-semibold {{ $permission->status == 'Diproses' ? 'text-yellow-500' : ($permission->status == 'Diizinkan' ? 'text-green-600' : 'text-red-600') }}">
                                    {{ $permission->status }}
                                </span>
                            </p>
                        </div>
                        <div>
                            <a href="{{ route('wali.perizinan.show', $permission->id) }}" class="inline-block px-4 py-2 bg-purple-600 text-white rounded hover:bg-purple-700 transition text-sm">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

</div>
@endsection
