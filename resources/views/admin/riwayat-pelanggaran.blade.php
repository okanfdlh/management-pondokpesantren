@extends('layouts.admin')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <h1 class="text-2xl font-bold mb-6 text-gray-700">Riwayat Pelanggaran</h1>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white rounded-xl shadow-lg">
        <table class="min-w-full table-auto border-collapse">
            <thead class="bg-teal-600 text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Santri</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Kategori</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Jenis Pelanggaran</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Tanggal</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @forelse ($violations as $v)
                    <tr class="border-b hover:bg-teal-50 transition">
                        <td class="px-6 py-4 font-medium">{{ $v->santri->nama }}</td>
                        <td class="px-6 py-4">
                            {{ $v->violationDetail?->category?->name ?? '-' }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $v->violationDetail->name ?? $v->description }}
                        </td>
                        <td class="px-6 py-4">{{ \Carbon\Carbon::parse($v->date)->format('d M Y') }}</td>
                        <td class="px-6 py-4 space-x-2">
                            <a href="{{ route('admin.edit-pelanggaran', $v->id) }}" class="text-blue-600 hover:underline font-semibold text-sm">
                                Edit
                            </a>
                            <form action="{{ route('admin.delete-pelanggaran', $v->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="text-red-600 hover:underline font-semibold text-sm"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-6 text-center text-gray-500">Belum ada data pelanggaran.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
