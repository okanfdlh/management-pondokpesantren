@extends('layouts.admin')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
        <h1 class="text-2xl font-bold text-gray-700">Data Santri</h1>
        <a href="{{ route('admin.santri.tambah-santri') }}" 
           class="inline-flex items-center gap-2 bg-teal-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-teal-700 transition">
           <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" 
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
             <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
           </svg>
           Tambah Santri
        </a>
    </div>

    <div class="overflow-x-auto bg-white rounded-xl shadow-lg">
        <table class="min-w-full table-auto border-collapse">
            <thead class="bg-teal-600 text-white">
                <tr>
                    <th class="px-6 py-3 text-left font-semibold text-sm">No</th>
                    <th class="px-6 py-3 text-left font-semibold text-sm">NIS</th>
                    <th class="px-6 py-3 text-left font-semibold text-sm">Nama</th>
                    <th class="px-6 py-3 text-left font-semibold text-sm">Jenis Kelamin</th>
                    <th class="px-6 py-3 text-left font-semibold text-sm">Tanggal Lahir</th>
                    <th class="px-6 py-3 text-left font-semibold text-sm">Alamat</th>
                    <th class="px-6 py-3 text-left font-semibold text-sm">Tahun Ajaran</th>
                    <th class="px-6 py-3 text-left font-semibold text-sm">Status</th>
                    <th class="px-6 py-3 text-left font-semibold text-sm">Wali Santri</th>
                    <th class="px-6 py-3 text-center font-semibold text-sm">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($santris as $index => $santri)
                <tr class="border-b hover:bg-teal-50 transition">
                    <td class="px-6 py-4 text-gray-700 font-medium whitespace-nowrap">{{ $index + 1 }}</td>
                    <td class="px-6 py-4 text-gray-600 whitespace-nowrap">{{ $santri->nis }}</td>
                    <td class="px-6 py-4 text-gray-900 font-semibold whitespace-nowrap">{{ $santri->nama }}</td>
                    <td class="px-6 py-4 text-gray-700 whitespace-nowrap">
                        {{ $santri->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                    </td>
                    <td class="px-6 py-4 text-gray-700 whitespace-nowrap">{{ \Carbon\Carbon::parse($santri->tanggal_lahir)->format('d M Y') }}</td>
                    <td class="px-6 py-4 text-gray-700 max-w-xs truncate" title="{{ $santri->alamat }}">{{ $santri->alamat }}</td>
                    <td class="px-6 py-4 text-gray-700 whitespace-nowrap">{{ $santri->tahun_ajaran }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full
                            @if($santri->status === 'Aktif') bg-green-200 text-green-800
                            @elseif($santri->status === 'Lulus') bg-blue-200 text-blue-800
                            @else bg-yellow-200 text-yellow-800
                            @endif
                            transition transform hover:scale-110">
                            {{ $santri->status }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-gray-700 font-medium whitespace-nowrap">{{ $santri->wali?->name ?? '-' }}</td>
                    <td class="px-6 py-4 text-center space-x-2 whitespace-nowrap">
                        <!-- Detail -->
                        <a href="{{ route('admin.santri.detail-santri', $santri->id) }}" 
                           class="text-green-600 hover:text-green-800" 
                           title="Detail Santri" 
                           aria-label="Detail Santri">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" >
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </a>

                        <!-- Edit -->
                        <a href="{{ route('admin.santri.edit-santri', $santri->id) }}" 
                           class="text-blue-600 hover:text-blue-800" 
                           title="Edit Santri" 
                           aria-label="Edit Santri">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" >
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 4h6a2 2 0 012 2v6m-4 4H7a2 2 0 01-2-2v-6m8-4L7 17" />
                            </svg>
                        </a>

                        <!-- Hapus -->
                        <form action="{{ route('admin.santri.destroy', $santri->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="text-red-600 hover:text-red-800" 
                                    title="Hapus Santri" 
                                    aria-label="Hapus Santri"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" >
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7L5 21M5 7l14 14" />
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
