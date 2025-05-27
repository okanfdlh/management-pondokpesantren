@extends('layouts.admin')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <h1 class="text-2xl font-semibold text-teal-700 mb-6 border-b pb-2">Tambah Wali Santri</h1>

    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white shadow rounded-xl p-6">
    <form action="{{ route('admin.wali-santri.store') }}" method="POST">
        @csrf

        <div class="mb-5">
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required
                class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-teal-500">
        </div>

        <div class="mb-5">
            <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
            <input type="text" name="username" id="username" value="{{ old('username') }}" required
                class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-teal-500">
        </div>

        <div class="mb-5">
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required
                class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-teal-500">
        </div>

        <div class="mb-6">
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
            <input type="password" name="password" id="password" required
                class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-teal-500">
        </div>

        <div class="flex justify-between items-center">
            <a href="{{ route('admin.wali-santri.data-santri') }}" class="text-sm text-gray-500 hover:underline">Batal</a>
            <button type="submit"
                class="bg-teal-600 hover:bg-teal-700 text-white text-sm font-medium px-5 py-2 rounded-md shadow">
                Simpan
            </button>
        </div>
    </form>
</div>
</div>
@endsection
