@extends('layouts.admin')

@section('content')
<div class="p-6 max-w-3xl mx-auto">
    <h1 class="text-xl font-bold mb-4">Edit Data Karyawan</h1>

    <form action="{{ route('admin.karyawan.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block font-medium mb-1">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name', $employee->name) }}" class="w-full border rounded px-3 py-2">
                @error('name') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block font-medium mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email', $employee->email) }}" class="w-full border rounded px-3 py-2">
                @error('email') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block font-medium mb-1">Nomor Telepon</label>
                <input type="text" name="phone" value="{{ old('phone', $employee->phone) }}" class="w-full border rounded px-3 py-2">
                @error('phone') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block font-medium mb-1">Jabatan</label>
                <input type="text" name="position" value="{{ old('position', $employee->position) }}" class="w-full border rounded px-3 py-2">
                @error('position') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="md:col-span-2">
                <label class="block font-medium mb-1">Terkait Akun User</label>
                <select name="user_id" class="w-full border rounded px-3 py-2">
                    <option value="">-- Pilih User --</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ old('user_id', $employee->user_id) == $user->id ? 'selected' : '' }}>
                            {{ $user->name }} ({{ $user->email }})
                        </option>
                    @endforeach
                </select>
                @error('user_id') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="mt-6 flex justify-end space-x-3">
            <a href="{{ route('admin.karyawan.index') }}" class="text-gray-600 hover:underline">Batal</a>
            <button type="submit" class="bg-teal-600 text-white px-4 py-2 rounded hover:bg-teal-700">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection
