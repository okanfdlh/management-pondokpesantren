@extends('layouts.admin')

@section('content')
<div class="p-6 max-w-xl mx-auto">
    <h1 class="text-xl font-bold mb-4">Tambah Wali Santri</h1>

    @if ($errors->any())
        <div class="mb-4 text-red-600">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.wali-santri.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block font-medium mb-1">Nama Lengkap</label>
            <input type="text" name="name" class="w-full border rounded px-3 py-2" value="{{ old('name') }}" required>
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Username</label>
            <input type="text" name="username" class="w-full border rounded px-3 py-2" value="{{ old('username') }}" required>
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Email</label>
            <input type="email" name="email" class="w-full border rounded px-3 py-2" value="{{ old('email') }}" required>
        </div>

        <div class="mb-6">
            <label class="block font-medium mb-1">Password</label>
            <input type="password" name="password" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="flex justify-end space-x-3">
            <a href="{{ route('admin.wali-santri.data-santri') }}" class="text-gray-600 hover:underline">Batal</a>
            <button type="submit" class="bg-teal-600 text-white px-4 py-2 rounded hover:bg-teal-700">Simpan</button>
        </div>
    </form>
</div>
@endsection
