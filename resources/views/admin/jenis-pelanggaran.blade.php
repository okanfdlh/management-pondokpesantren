@extends('layouts.admin')

@section('content')
<main class="p-6 md:p-8 max-w-full">
    <h2 class="text-2xl md:text-3xl font-bold mb-6 text-gray-800 border-b border-gray-200 pb-3">Manajemen Jenis Pelanggaran</h2>

    {{-- Form Tambah Jenis Pelanggaran --}}
    <div class="bg-white shadow rounded-xl p-6 mb-10">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">Tambah Jenis Pelanggaran</h3>
        <form method="POST" action="{{ route('admin.jenis-pelanggaran.store') }}" class="space-y-6">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-600 mb-1">Kategori</label>
<<<<<<< HEAD
                    <select name="category" id="category" required class="w-full border border-gray-300 rounded-lg focus:ring-[#009688] focus:border-[#009688] p-2.5">
=======
                    <select name="category" id="category" required class="w-full border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5">
>>>>>>> d53a04c984fd556d50eb9b7e681083cae80e2b4e
                        <option value="" disabled selected>Pilih Kategori</option>
                        <option value="ringan">Ringan</option>
                        <option value="sedang">Sedang</option>
                        <option value="berat">Berat</option>
                    </select>
                </div>
<<<<<<< HEAD
                <div class="md:col-span-2 flex flex-col md:flex-row md:items-center gap-4">
                    <div class="w-full">
                        <label for="name" class="block text-sm font-medium text-gray-600 mb-1">Detail Pelanggaran</label>
                        <input type="text" name="name" id="name" placeholder="Contoh: Makan sambil berdiri" required class="w-full border border-gray-300 rounded-lg focus:ring-[#009688] focus:border-[#009688] p-2.5">
                    </div>
                    <div class="pt-6 md:pt-0">
                        <button type="submit" class="inline-flex items-center bg-[#009688] hover:bg-[#00796B] text-white font-semibold px-6 py-2 rounded-lg shadow-sm mt-1 md:mt-6">
                        Tambah
                        </button>
                    </div>
                </div>
            </div>
=======
                <div class="md:col-span-2">
                    <label for="name" class="block text-sm font-medium text-gray-600 mb-1">Detail Pelanggaran</label>
                    <input type="text" name="name" id="name" placeholder="Contoh: Makan sambil berdiri" required class="w-full border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5">
                </div>
            </div>
            <div class="text-right">
                <button type="submit" class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg shadow-sm">
                    + Tambah
                </button>
            </div>
>>>>>>> d53a04c984fd556d50eb9b7e681083cae80e2b4e
        </form>
    </div>

    {{-- Daftar Pelanggaran Berdasarkan Kategori --}}
    @foreach ($categories as $category)
        <div class="bg-white shadow rounded-xl mb-6">
<<<<<<< HEAD
            <div class="bg-[#E0F2F1] px-6 py-4 rounded-t-xl border-b border-[#B2DFDB]">
                <h4 class="text-lg font-semibold text-[#009688]">{{ ucfirst($category->name) }}</h4>
=======
            <div class="bg-blue-100 px-6 py-4 rounded-t-xl border-b border-blue-200">
                <h4 class="text-lg font-semibold text-blue-800">{{ ucfirst($category->name) }}</h4>
>>>>>>> d53a04c984fd556d50eb9b7e681083cae80e2b4e
            </div>
            <ul class="divide-y divide-gray-200">
                @forelse ($category->details as $detail)
                    <li class="px-6 py-4 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <form method="POST" action="{{ route('admin.jenis-pelanggaran.update', $detail->id) }}" class="flex flex-col md:flex-row md:items-center w-full gap-3">
                            @csrf
                            @method('PUT')
<<<<<<< HEAD
                            <input type="text" name="name" value="{{ $detail->name }}" class="w-full md:w-2/3 border border-gray-300 rounded-lg p-2 focus:ring-[#009688] focus:border-[#009688]">
=======
                            <input type="text" name="name" value="{{ $detail->name }}" class="w-full md:w-2/3 border border-gray-300 rounded-lg p-2 focus:ring-blue-500 focus:border-blue-500">
>>>>>>> d53a04c984fd556d50eb9b7e681083cae80e2b4e
                            <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-medium px-4 py-2 rounded-lg shadow-sm">
                                Simpan
                            </button>
                        </form>
                        <form method="POST" action="{{ route('admin.jenis-pelanggaran.delete', $detail->id) }}" onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-600 hover:bg-red-700 text-white font-medium px-4 py-2 rounded-lg shadow-sm">
                                Hapus
                            </button>
                        </form>
                    </li>
                @empty
                    <li class="px-6 py-4 text-gray-500 italic">Belum ada pelanggaran dalam kategori ini.</li>
                @endforelse
            </ul>
        </div>
    @endforeach
    
</main>

@endsection
