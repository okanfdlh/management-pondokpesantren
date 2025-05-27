@extends('layouts.admin')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
        <h1 class="text-2xl font-bold mb-6 text-gray-700">Data Wali Santri</h1>
        <a href="{{ route('admin.wali-santri.tambah-walisantri') }}" 
           class="inline-flex items-center gap-2 bg-teal-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-teal-700 transition">
           + Tambah Wali
        </a>
    </div>

    <div class="overflow-x-auto bg-white rounded-xl shadow-lg">
        <table class="min-w-full table-auto border-collapse">
            <thead class="bg-teal-600 text-white">
                <tr>
                    <th class="px-6 py-3 text-left font-semibold text-sm">No</th>
                    <th class="px-6 py-3 text-left font-semibold text-sm">Nama</th>
                    <th class="px-6 py-3 text-left font-semibold text-sm">Username</th>
                    <th class="px-6 py-3 text-left font-semibold text-sm">Email</th>
                    <th class="px-6 py-3 text-left font-semibold text-sm">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $index => $user)
                    <tr class="border-b hover:bg-teal-50 transition">
                        <td class="px-6 py-4 text-gray-700 font-medium">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 text-gray-900 font-semibold">{{ $user->name }}</td>
                        <td class="px-6 py-4 text-gray-700">{{ $user->username }}</td>
                        <td class="px-6 py-4 text-gray-700">{{ $user->email }}</td>
                        <td class="px-6 py-4 space-x-2">
                            <a href="{{ route('admin.wali-santri.edit-walisantri', $user->id) }}"
                               class="text-blue-600 hover:underline font-semibold text-sm">Edit</a>
                            <form action="{{ route('admin.wali-santri.destroy', $user->id) }}" method="POST" class="inline">
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
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
