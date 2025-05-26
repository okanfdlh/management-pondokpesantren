@extends('layouts.admin')

@section('content')
<div class="p-6 max-w-3xl mx-auto">
    <h1 class="text-xl font-bold mb-4">Tambah Gaji Karyawan</h1>

    <form action="{{ route('admin.salaries.store') }}" method="POST" id="salaryForm">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block font-medium mb-1">Nama Karyawan</label>
                <select name="employee_id" class="w-full border rounded px-3 py-2" id="employee_id">
                    <option value="">Pilih Karyawan</option>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->id }}" {{ old('employee_id') == $employee->id ? 'selected' : '' }}>{{ $employee->name }}</option>
                    @endforeach
                </select>
                @error('employee_id')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>
    
            <div>
                <label class="block font-medium mb-1">Jumlah Gaji</label>
                <input type="number" name="amount" class="w-full border rounded px-3 py-2" placeholder="Jumlah Gaji" id="amount" value="{{ old('amount') }}">
                @error('amount')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>
    
            <div>
                <label class="block font-medium mb-1">Tanggal Pembayaran</label>
                <input type="date" name="payment_date" class="w-full border rounded px-3 py-2" id="payment_date" value="{{ old('payment_date') }}">
                @error('payment_date')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>
    
            <div>
                <label class="block font-medium mb-1">Status Pembayaran</label>
                <select name="payment_status" class="w-full border rounded px-3 py-2" id="payment_status">
                    <option value="pending" {{ old('payment_status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="paid" {{ old('payment_status') == 'paid' ? 'selected' : '' }}>Paid</option>
                    <option value="cancelled" {{ old('payment_status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
                @error('payment_status')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
    
        <div class="mt-6 flex justify-end space-x-3">
            <a href="{{ route('admin.salaries.index') }}" class="text-gray-600 hover:underline">Kembali</a>
            <button type="submit" class="bg-teal-600 text-white px-4 py-2 rounded hover:bg-teal-700" id="submitButton">Simpan</button>
        </div>
    </form>
    
</div>

<script>
    function validateForm() {
     let isValid = true;

     const errors = document.querySelectorAll('.text-red-600');
     errors.forEach((error) => error.classList.add('hidden'));

     // Validate Employee
     if (document.getElementById('employee_id').value === "") {
         document.getElementById('employeeError').classList.remove('hidden');
         isValid = false;
     }

     // Validate Amount
     if (document.getElementById('amount').value === "" || parseFloat(document.getElementById('amount').value) <= 0) {
         document.getElementById('amountError').classList.remove('hidden');
         isValid = false;
     }

     // Validate Payment Date
     if (document.getElementById('payment_date').value === "") {
         document.getElementById('paymentDateError').classList.remove('hidden');
         isValid = false;
     }

     // Validate Payment Status
     if (document.getElementById('payment_status').value === "") {
         document.getElementById('paymentStatusError').classList.remove('hidden');
         isValid = false;
     }

     document.getElementById('submitButton').disabled = !isValid;
     console.log(isValid);  // Debugging validation
     return isValid;
 }

</script>
@endsection
