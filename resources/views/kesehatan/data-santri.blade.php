@extends('layouts.kesehatan')

@section('content')
<div class="p-6">
<div class="p-6 bg-gray-50 min-h-screen">
    <h1 class="text-2xl font-bold mb-6 text-gray-700">Daftar Santri</h1>
        <p class="text-gray-600">Berikut adalah daftar santri yang bisa Anda akses.</p>

    <div class="overflow-x-auto bg-white rounded-md shadow-md">
        <table class="min-w-full table-auto">
            <thead class="bg-teal-600 text-white">
                <tr>
                    <th class="px-4 py-3 text-left">No</th>
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
</div>
@endsection
