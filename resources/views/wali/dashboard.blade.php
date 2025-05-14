@extends('layouts.wali')

@section('content')
        <!-- Bagian Ringkasan -->
    <section class="mb-10">
      <h2 class="text-lg font-semibold mb-4 text-[--primary]">Ringkasan Santri</h2>
      <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="bg-[#f5fff5] border border-[--primary] p-4 rounded-lg shadow-sm text-center">
          <div class="text-gray-600 text-sm">Pelanggaran</div>
          <div class="text-2xl font-bold mt-1 text-[--primary]">3</div>
        </div>
        <div class="bg-[#f5fff5] border border-[--primary] p-4 rounded-lg shadow-sm text-center">
          <div class="text-gray-600 text-sm">Prestasi</div>
          <div class="text-2xl font-bold mt-1 text-[--primary]">5</div>
        </div>
        <div class="bg-[#f5fff5] border border-[--primary] p-4 rounded-lg shadow-sm text-center">
          <div class="text-gray-600 text-sm">Izin</div>
          <div class="text-2xl font-bold mt-1 text-[--primary]">2</div>
        </div>
        <div class="bg-[#f5fff5] border border-[--primary] p-4 rounded-lg shadow-sm text-center">
          <div class="text-gray-600 text-sm">Riwayat Kesehatan</div>
          <div class="text-2xl font-bold mt-1 text-[--primary]">4</div>
        </div>
      </div>
    </section>

    <!-- Menu Navigasi -->
    <section>
      <h2 class="text-lg font-semibold mb-4 text-[--primary]">Menu Utama</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        <!-- Menu Item -->
        <div class="bg-white border-l-4 border-[--primary] rounded-lg shadow p-5 flex items-start gap-4 hover:bg-[#f5fff5] transition cursor-pointer">
          <i class="fas fa-user-edit text-2xl text-[--primary]"></i>
          <div>
            <h3 class="font-semibold mb-1">Edit Data</h3>
            <p class="text-sm text-gray-600 mb-3">Ubah data wali & santri.</p>
            <a href="#" class="inline-block px-3 py-1 bg-[--primary] text-white text-sm rounded hover:bg-green-700 transition">Buka</a>
          </div>
        </div>

        <div class="bg-white border-l-4 border-yellow-500 rounded-lg shadow p-5 flex items-start gap-4 hover:bg-yellow-50 transition cursor-pointer">
          <i class="fas fa-exclamation-circle text-2xl text-yellow-500"></i>
          <div>
            <h3 class="font-semibold mb-1">Riwayat Pelanggaran</h3>
            <p class="text-sm text-gray-600 mb-3">Lihat catatan pelanggaran.</p>
            <a href="#" class="inline-block px-3 py-1 bg-[--primary] text-white text-sm rounded hover:bg-green-700 transition">Lihat</a>
          </div>
        </div>

        <div class="bg-white border-l-4 border-blue-500 rounded-lg shadow p-5 flex items-start gap-4 hover:bg-blue-50 transition cursor-pointer">
          <i class="fas fa-award text-2xl text-blue-500"></i>
          <div>
            <h3 class="font-semibold mb-1">Prestasi Santri</h3>
            <p class="text-sm text-gray-600 mb-3">Pencapaian santri.</p>
            <a href="#" class="inline-block px-3 py-1 bg-[--primary] text-white text-sm rounded hover:bg-green-700 transition">Lihat</a>
          </div>
        </div>

        <div class="bg-white border-l-4 border-purple-500 rounded-lg shadow p-5 flex items-start gap-4 hover:bg-purple-50 transition cursor-pointer">
        <i class="fas fa-calendar-check text-2xl text-purple-500"></i>
        <div>
            <h3 class="font-semibold mb-1">Izin Santri</h3>
            <p class="text-sm text-gray-600 mb-3">Ajukan atau cek izin.</p>
            <div class="flex gap-2">
            <a href="{{ route('wali.perizinan.form') }}" class="inline-block px-3 py-1 bg-[--primary] text-white text-sm rounded hover:bg-green-700 transition">Ajukan</a>
            <a href="{{ route('wali.perizinan.histori') }}" class="inline-block px-3 py-1 bg-gray-200 text-gray-800 text-sm rounded hover:bg-gray-300 transition">Riwayat</a>
            </div>
        </div>
        </div>


        <div class="bg-white border-l-4 border-red-500 rounded-lg shadow p-5 flex items-start gap-4 hover:bg-red-50 transition cursor-pointer">
          <i class="fas fa-heartbeat text-2xl text-red-500"></i>
          <div>
            <h3 class="font-semibold mb-1">Kesehatan</h3>
            <p class="text-sm text-gray-600 mb-3">Lihat riwayat kesehatan santri.</p>
            <a href="#" class="inline-block px-3 py-1 bg-[--primary] text-white text-sm rounded hover:bg-green-700 transition">Lihat</a>
          </div>
        </div>

        <div class="bg-white border-l-4 border-indigo-500 rounded-lg shadow p-5 flex items-start gap-4 hover:bg-indigo-50 transition cursor-pointer">
          <i class="fas fa-home text-2xl text-indigo-500"></i>
          <div>
            <h3 class="font-semibold mb-1">Status Perpulangan</h3>
            <p class="text-sm text-gray-600 mb-3">Cek jika santri diperbolehkan pulang.</p>
            <a href="#" class="inline-block px-3 py-1 bg-[--primary] text-white text-sm rounded hover:bg-green-700 transition">Cek</a>
          </div>
        </div>

      </div>
    </section>

@endsection
