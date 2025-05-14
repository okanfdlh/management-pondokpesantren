@extends('layouts.admin')

@section('content')
<div class="p-6">
    <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
        <h1 class="text-2xl font-semibold">Data Wali Santri</h1>
        <a href="{{ route('admin.wali-santri.tambah-walisantri') }}" class="bg-teal-600 text-white px-5 py-2 rounded-md hover:bg-teal-700 transition">+ Tambah Wali</a>
    </div>

    <div class="overflow-x-auto bg-white rounded-md shadow-md">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-3 text-left">No</th>
                    <th class="px-4 py-3 text-left">Nama</th>
                    <th class="px-4 py-3 text-left">Username</th>
                    <th class="px-4 py-3 text-left">Email</th>
                    <th class="px-4 py-3 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($users as $index => $user)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-3">{{ $index + 1 }}</td>
                        <td class="px-4 py-3">{{ $user->name }}</td>
                        <td class="px-4 py-3">{{ $user->username }}</td>
                        <td class="px-4 py-3">{{ $user->email }}</td>
                        <td class="px-4 py-3 space-x-2">
                            <a href="{{ route('admin.wali-santri.edit-walisantri', $user->id) }}" class="text-blue-600 hover:underline text-sm">Edit</a>
                            <form action="{{ route('admin.wali-santri.destroy', $user->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline text-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
