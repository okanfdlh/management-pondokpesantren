@extends('layouts.admin')

@section('content')
<div class="p-6">
    <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
        <h1 class="text-2xl font-semibold">Data Karyawan</h1>
        <a href="{{ route('admin.karyawan.create') }}" class="bg-teal-600 text-white px-5 py-2 rounded-md hover:bg-teal-700 transition">+ Tambah Karyawan</a>
    </div>

    <div class="flex flex-col md:flex-row md:items-center md:space-x-4 space-y-3 md:space-y-0 mb-4">
        <input type="text" placeholder="Cari berdasarkan nama atau email..." class="w-full md:w-1/3 border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-teal-400" />

        <select class="w-full md:w-1/4 border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-teal-400">
            <option value="">Semua Posisi</option>
            <option value="Manager">Manager</option>
            <option value="Staff">Staff</option>
            <!-- Tambahkan opsi lainnya jika perlu -->
        </select>
    </div>

    <div class="overflow-x-auto bg-white rounded-md shadow-md">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-3 text-left">No</th>
                    <th class="px-4 py-3 text-left">Nama</th>
                    <th class="px-4 py-3 text-left">Email</th>
                    <th class="px-4 py-3 text-left">No HP</th>
                    <th class="px-4 py-3 text-left">Posisi</th>
                    <th class="px-4 py-3 text-left">Gaji</th> <!-- New column for Salary -->
                    <th class="px-4 py-3 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($employees as $index => $employee)
                <tr class="border-t hover:bg-gray-50">
                    <td class="px-4 py-3">{{ $index + 1 }}</td>
                    <td class="px-4 py-3">{{ $employee->name }}</td>
                    <td class="px-4 py-3">{{ $employee->email }}</td>
                    <td class="px-4 py-3">{{ $employee->phone }}</td>
                    <td class="px-4 py-3">{{ $employee->position }}</td>
                    <td class="px-4 py-3">
                        @if($employee->salaries->isNotEmpty())
                            Rp {{ number_format($employee->salaries->last()->amount, 0, ',', '.') }}
                        @else
                            N/A
                        @endif
                    </td>
                     <!-- Display Salary -->
                    <td class="px-4 py-3 space-x-2">
                        <a href="{{ route('admin.karyawan.edit', $employee->id) }}" class="text-blue-600 hover:underline text-sm">Edit</a>
                        <form action="{{ route('admin.karyawan.destroy', $employee->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline text-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
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
