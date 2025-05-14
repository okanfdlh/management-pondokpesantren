@extends('layouts.kesehatan')

@section('content')
<div class="p-6">
    <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
        <h1 class="text-2xl font-semibold">Daftar Santri</h1>
        <p class="text-gray-600">Berikut adalah daftar santri yang bisa Anda akses.</p>
    </div>

    <div class="flex flex-col md:flex-row md:items-center md:space-x-4 space-y-3 md:space-y-0 mb-4">
        <input type="text" placeholder="Cari berdasarkan nama atau NIS..." class="w-full md:w-1/3 border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-teal-400" />

        <select class="w-full md:w-1/4 border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-teal-400">
            <option value="">Semua Jenis Kelamin</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>

        <select class="w-full md:w-1/4 border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-teal-400">
            <option value="">Semua Status</option>
            <option value="Aktif">Aktif</option>
            <option value="Tidak Aktif">Tidak Aktif</option>
        </select>
    </div>

    <div class="overflow-x-auto bg-white rounded-md shadow-md">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-3 text-left">No</th>
                    <th class="px-4 py-3 text-left">Foto</th>
                    <th class="px-4 py-3 text-left">NIS</th>
                    <th class="px-4 py-3 text-left">Nama</th>
                    <th class="px-4 py-3 text-left">Jenis Kelamin</th>
                    <th class="px-4 py-3 text-left">Tanggal Lahir</th>
                    <th class="px-4 py-3 text-left">Tahun Ajaran</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <!-- <th class="px-4 py-3 text-left">Aksi</th> -->
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($santris as $index => $santri)
                <tr class="border-t hover:bg-gray-50">
                    <td class="px-4 py-3">{{ $index + 1 }}</td>
                    <td class="px-4 py-3">
                        @if($santri->foto)
                        <img src="{{ asset('storage/' . $santri->foto) }}" alt="Foto" class="w-10 h-10 rounded-full object-cover">
                        @else
                        <span class="text-sm text-gray-500">Tidak ada</span>
                        @endif
                    </td>
                    <td class="px-4 py-3">{{ $santri->nis }}</td>
                    <td class="px-4 py-3">{{ $santri->nama }}</td>
                    <td class="px-4 py-3">{{ $santri->jenis_kelamin }}</td>
                    <td class="px-4 py-3">{{ $santri->tanggal_lahir }}</td>
                    <td class="px-4 py-3">{{ $santri->tahun_ajaran }}</td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 text-xs rounded-full {{ $santri->status === 'Aktif' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $santri->status }}
                        </span>
                    </td>
                    <!-- <td class="px-4 py-3 space-x-2">
                        <a href="{{route('admin.santri.edit-santri', $santri->id)}}" class="text-blue-600 hover:underline text-sm">Edit</a>
                        <form action="{{ route('admin.santri.destroy', $santri->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline text-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                Hapus
                            </button>
                        </form> -->
                        <!-- <a href="{{route('admin.santri.destroy', $santri->id)}}" class="text-red-600 hover:underline text-sm">Hapus</a> -->
                    <!-- </td> -->
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
