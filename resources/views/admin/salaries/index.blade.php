@extends('layouts.admin')

@section('content')
<div class="p-6">
    <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
        <h1 class="text-2xl font-semibold">Manajemen Gaji Karyawan</h1>
        <a href="{{ route('admin.salaries.create') }}" class="bg-teal-600 text-white px-5 py-2 rounded-md hover:bg-teal-700 transition">+ Tambah Gaji</a>
    </div>

    <div class="overflow-x-auto bg-white rounded-md shadow-md">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-3 text-left">No</th>
                    <th class="px-4 py-3 text-left">Nama Karyawan</th>
                    <th class="px-4 py-3 text-left">Jumlah Gaji</th>
                    <th class="px-4 py-3 text-left">Tanggal Pembayaran</th>
                    <th class="px-4 py-3 text-left">Status Pembayaran</th>
                    <th class="px-4 py-3 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach($salaries as $index => $salary)
                <tr class="border-t hover:bg-gray-50">
                    <td class="px-4 py-3">{{ $index + 1 }}</td>
                    <td class="px-4 py-3">{{ $salary->employee->name }}</td>
                    <td class="px-4 py-3">Rp {{ number_format($salary->amount, 0, ',', '.') }}</td>
                    <td class="px-4 py-3">{{ $salary->payment_date->format('d-m-Y') }}</td>
                    <td class="px-4 py-3">{{ ucfirst($salary->payment_status) }}</td>
                    <td class="px-4 py-3 space-x-2">
                        <a href="{{ route('admin.salaries.download', $salary->id) }}" class="text-green-600 hover:underline text-sm">Download PDF</a>
                        <a href="{{ route('admin.salaries.edit', $salary->id) }}" class="text-blue-600 hover:underline text-sm">Edit</a>
                        <form action="{{ route('admin.salaries.destroy', $salary->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline text-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus gaji ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
