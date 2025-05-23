@extends('layouts.admin')

@section('content')
<div class="p-6 max-w-2xl mx-auto">
    <h1 class="text-xl font-bold mb-4">Edit Data Wali Santri</h1>

    <form action="{{ route('admin.wali-santri.update', $users->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 gap-4">
            <div>
                <label class="block font-medium mb-1">Nama</label>
                <input type="text" name="name" value="{{ old('name', $users->name) }}" class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block font-medium mb-1">Username</label>
                <input type="text" name="username" value="{{ old('username', $users->username) }}" class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block font-medium mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email', $users->email) }}" class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block font-medium mb-1">Password Baru (Opsional)</label>
                <input type="password" name="password" class="w-full border rounded px-3 py-2">
                <p class="text-sm text-gray-500 mt-1">Kosongkan jika tidak ingin mengubah password.</p>
            </div>
        </div>

        <div class="mt-6 flex justify-end space-x-3">
            <a href="{{ route('admin.wali-santri.data-santri') }}" class="text-gray-600 hover:underline">Batal</a>
            <button type="submit" class="bg-teal-600 text-white px-4 py-2 rounded hover:bg-teal-700">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection
