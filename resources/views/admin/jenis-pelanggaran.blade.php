@extends('layouts.admin')

@section('content')
<main class="p-6">
    <h2 class="text-xl font-semibold mb-4">Jenis Pelanggaran</h2>

    <form method="POST" action="{{ route('admin.jenis-pelanggaran.store') }}" class="mb-6">
        @csrf
        <div class="flex items-center space-x-4 mb-2">
            <input type="text" name="category" placeholder="Kategori baru (misal: ringan)" class="border p-2 rounded">
            <input type="text" name="name" placeholder="Detail pelanggaran (misal: makan berdiri)" class="border p-2 rounded w-full">
            <button class="bg-blue-600 text-white px-4 py-2 rounded">Tambah</button>
        </div>
    </form>

    @foreach ($categories as $category)
        <div class="mb-4">
            <h3 class="font-semibold">{{ ucfirst($category->name) }}</h3>
            <ul class="list-disc pl-6 text-gray-700">
                @foreach ($category->details as $detail)
                    <li>{{ $detail->name }}</li>
                @endforeach
            </ul>
        </div>
    @endforeach
</main>

@endsection
