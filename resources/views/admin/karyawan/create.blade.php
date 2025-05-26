@extends('layouts.admin')

@section('content')
<div class="p-6 max-w-3xl mx-auto">
    <h1 class="text-xl font-bold mb-4">Tambah Karyawan</h1>

    <form action="{{ route('admin.karyawan.store') }}" method="POST" enctype="multipart/form-data" id="employeeForm">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block font-medium mb-1">Nama</label>
                <input type="text" name="name" class="w-full border rounded px-3 py-2" placeholder="Nama Karyawan" id="name" value="{{ old('name') }}">
                <p id="nameError" class="text-red-600 hidden">Harap isi Nama Lengkap.</p>
            </div>

            <div>
                <label class="block font-medium mb-1">Email</label>
                <input type="email" name="email" class="w-full border rounded px-3 py-2" placeholder="Email" id="email" value="{{ old('email') }}">
                <p id="emailError" class="text-red-600 hidden">Harap isi Email yang valid.</p>
            </div>

            <div>
                <label class="block font-medium mb-1">Telepon</label>
                <input type="text" name="phone" class="w-full border rounded px-3 py-2" placeholder="Nomor Telepon" id="phone" value="{{ old('phone') }}">
                <p id="phoneError" class="text-red-600 hidden">Harap isi Nomor Telepon.</p>
            </div>

            <div>
                <label class="block font-medium mb-1">Posisi</label>
                <input type="text" name="position" class="w-full border rounded px-3 py-2" placeholder="Posisi Karyawan" id="position" value="{{ old('position') }}">
                <p id="positionError" class="text-red-600 hidden">Harap isi Posisi.</p>
            </div>

            <div>
                <label class="block font-medium mb-1">User</label>
                <select name="user_id" class="w-full border rounded px-3 py-2" id="user_id">
                    <option value="">Pilih User</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
                <p id="userIdError" class="text-red-600 hidden">Harap pilih User.</p>
            </div>

            <div class="md:col-span-2">
                <label class="block font-medium mb-1">Foto</label>
                <input type="file" name="foto" class="w-full border rounded px-3 py-2" id="fotoInput">
                <p id="fotoError" class="text-red-600 hidden">Harap pilih gambar yang valid (jpg, jpeg, png, gif) dan ukuran maksimal 2MB.</p>
            </div>
        </div>

        <div class="mt-6 flex justify-end space-x-3">
            <a href="{{ route('admin.karyawan.index') }}" class="text-gray-600 hover:underline">Kembali</a>
            <button type="submit" class="bg-teal-600 text-white px-4 py-2 rounded hover:bg-teal-700" id="submitButton" disabled>Simpan</button>
        </div>
    </form>
</div>

<script>
    function validateForm() {
        let isValid = true;

        const errors = document.querySelectorAll('.text-red-600');
        errors.forEach((error) => error.classList.add('hidden'));

        // Validasi Foto
        var fileInput = document.getElementById('fotoInput');
        var file = fileInput.files[0];
        if (file) {
            var validTypes = ['image/jpeg', 'image/png', 'image/gif'];
            if (!validTypes.includes(file.type)) {
                document.getElementById('fotoError').textContent = 'Harap pilih gambar yang valid (jpg, jpeg, png, gif).';
                document.getElementById('fotoError').classList.remove('hidden');
                isValid = false;
            } else if (file.size > 2048 * 1024) {
                document.getElementById('fotoError').textContent = 'Ukuran gambar maksimal 2MB.';
                document.getElementById('fotoError').classList.remove('hidden');
                isValid = false;
            } else {
                document.getElementById('fotoError').classList.add('hidden');
            }
        } else {
            document.getElementById('fotoError').classList.add('hidden');
        }
        document.getElementById('submitButton').disabled = !isValid;
        return isValid;
    }

    document.getElementById('submitButton').addEventListener('click', function(event) {
        event.preventDefault();
        if (validateForm()) {
            document.getElementById('employeeForm').submit(); 
        }
    });

    document.getElementById('fotoInput').addEventListener('change', validateForm);
</script>
@endsection
w