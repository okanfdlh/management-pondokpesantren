@extends('layouts.admin')

@section('content')
<div class="p-6 max-w-3xl mx-auto">
    <h1 class="text-xl font-bold mb-4">Tambah Wali Santri</h1>

    <form action="{{ route('admin.santri.store') }}" method="POST" enctype="multipart/form-data" id="santriForm">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block font-medium mb-1">NIS</label>
                <input type="text" name="nis" class="w-full border rounded px-3 py-2" placeholder="Nomor Induk Santri" id="nis">
                <p id="nisError" class="text-red-600 hidden">Harap isi NIS.</p>
            </div>

            <div>
                <label class="block font-medium mb-1">Nama Lengkap</label>
                <input type="text" name="nama" class="w-full border rounded px-3 py-2" placeholder="Nama Santri" id="nama">
                <p id="namaError" class="text-red-600 hidden">Harap isi Nama Lengkap.</p>
            </div>

            <div>
                <label class="block font-medium mb-1">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="w-full border rounded px-3 py-2" id="jenis_kelamin">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
                <p id="jenisKelaminError" class="text-red-600 hidden">Harap pilih Jenis Kelamin.</p>
            </div>

            <div>
                <label class="block font-medium mb-1">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="w-full border rounded px-3 py-2" id="tanggal_lahir">
                <p id="tanggalLahirError" class="text-red-600 hidden">Harap isi Tanggal Lahir.</p>
            </div>

            <div class="md:col-span-2">
                <label class="block font-medium mb-1">Alamat</label>
                <textarea name="alamat" class="w-full border rounded px-3 py-2" rows="3" placeholder="Alamat lengkap" id="alamat"></textarea>
                <p id="alamatError" class="text-red-600 hidden">Harap isi Alamat.</p>
            </div>

            <div>
                <label class="block font-medium mb-1">Tahun Ajaran</label>
                <input type="text" name="tahun_ajaran" class="w-full border rounded px-3 py-2" placeholder="2024/2025" id="tahun_ajaran">
                <p id="tahunAjaranError" class="text-red-600 hidden">Harap isi Tahun Ajaran.</p>
            </div>

            <div>
                <label class="block font-medium mb-1">Status</label>
                <select name="status" class="w-full border rounded px-3 py-2" id="status">
                    <option value="">Pilih Status</option>
                    <option value="Aktif">Aktif</option>
                    <option value="Lulus">Lulus</option>
                    <option value="Cuti">Cuti</option>
                </select>
                <p id="statusError" class="text-red-600 hidden">Harap pilih Status.</p>
            </div>

            <div class="md:col-span-2">
                <label class="block font-medium mb-1">Foto</label>
                <input type="file" name="foto" class="w-full border rounded px-3 py-2" id="fotoInput">
                <p id="fotoError" class="text-red-600 hidden">Harap pilih gambar yang valid (jpg, jpeg, png, gif) dan ukuran maksimal 2MB.</p>
            </div>
        </div>

        <div class="mt-6 flex justify-end space-x-3">
            <a href="{{ route('admin.santri.data-santri') }}" class="text-gray-600 hover:underline">Kembali</a>
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
            document.getElementById('santriForm').submit(); 
        }
    });

    document.getElementById('fotoInput').addEventListener('change', validateForm);
</script>
@endsection
