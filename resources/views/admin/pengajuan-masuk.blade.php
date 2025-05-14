@extends('layouts.admin')

@section('content')
{{-- <main class="p-6">
  <h2 class="text-xl font-semibold mb-4">Pengajuan Masuk</h2>
  <p class="text-gray-600">Lihat dan kelola pengajuan izin masuk pondok oleh santri.</p>
</main> --}}

<main class="p-6">
    <h2 class="text-xl font-semibold mb-4">Pengajuan Masuk</h2>
    <p class="text-gray-600 mb-4">Lihat dan kelola pengajuan izin masuk pondok oleh santri.</p>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full table-auto border-collapse border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-4 py-2">Nama Santri</th>
                    <th class="border px-4 py-2">Kategori</th>
                    <th class="border px-4 py-2">Alasan</th>
                    <th class="border px-4 py-2">Tanggal Permintaan</th>
                    {{-- <th class="border px-4 py-2">Status</th> --}}
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($permissions as $permission)
                    <tr>
                        <td class="border px-4 py-2">{{ $permission->santri->nama ?? '-' }}</td>
                        <td class="border px-4 py-2">{{ $permission->kategori_perizinan }}</td>
                        <td class="border px-4 py-2">{{ $permission->reason }}</td>
                        <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($permission->request_date)->format('d M Y') }}</td>
                        <td class="border px-4 py-2">
                            <form action="{{ route('admin.update-status-perizinan', $permission->id) }}" method="POST" class="flex space-x-2">
                                @csrf
                                @method('PUT')
                                <select name="status" class="border rounded px-2 py-1 text-sm">
                                    <option value="Diproses" {{ $permission->status == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                                    <option value="Diizinkan" {{ $permission->status == 'Diizinkan' ? 'selected' : '' }}>Diizinkan</option>
                                    <option value="Ditolak" {{ $permission->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                                </select>

                                <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded text-sm hover:bg-blue-600">
                                    Update
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="border px-4 py-2 text-center text-gray-500">Tidak ada pengajuan saat ini.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</main>
@endsection

