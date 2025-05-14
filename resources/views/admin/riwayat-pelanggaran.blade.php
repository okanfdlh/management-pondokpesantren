@extends('layouts.admin')

@section('content')
<div class="container mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-6 text-gray-700">Riwayat Pelanggaran</h1>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded">
            <thead>
                <tr class="bg-gray-100 text-gray-700">
                    <th class="border px-6 py-3 text-left text-sm font-medium">Santri</th>
                    <th class="border px-6 py-3 text-left text-sm font-medium">Jenis Pelanggaran</th>
                    <th class="border px-6 py-3 text-left text-sm font-medium">Deskripsi</th>
                    <th class="border px-6 py-3 text-left text-sm font-medium">Tanggal</th>
                    <th class="border px-6 py-3 text-left text-sm font-medium">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @forelse ($violations as $v)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="border px-6 py-3">{{ $v->santri->nama }}</td>
                        <td class="border px-6 py-3">{{ $v->violation_type }}</td>
                        <td class="border px-6 py-3">{{ $v->description ?? '-' }}</td>
                        <td class="border px-6 py-3">{{ \Carbon\Carbon::parse($v->date)->format('d M Y') }}</td>
                        <td class="border px-6 py-3">
                            <div class="flex items-center space-x-3">
                                <a href="{{ route('admin.edit-pelanggaran', $v->id) }}" class="text-blue-600 hover:underline text-sm">Edit</a>
                                <form action="{{ route('admin.delete-pelanggaran', $v->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline text-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-gray-500">Belum ada data pelanggaran.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
