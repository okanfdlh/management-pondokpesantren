<!-- resources/views/admin/salary_history.blade.php -->

@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">History Gaji untuk {{ $employee->name }}</h2>
    <table class="min-w-full bg-white border border-gray-300 rounded-lg">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Tanggal</th>
                <th class="py-2 px-4 border-b">Gaji</th>
                <th class="py-2 px-4 border-b">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($salaries as $salary)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $salary->date->format('d-m-Y') }}</td>
                    <td class="py-2 px-4 border-b">Rp {{ number_format($salary->amount, 0, ',', '.') }}</td>
                    <td class="py-2 px-4 border-b">{{ $salary->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
