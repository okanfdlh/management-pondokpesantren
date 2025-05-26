<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Salary extends Model
{
    // Trait untuk mendukung pembuatan data menggunakan factory (biasanya digunakan dalam seeding dan testing)
    use HasFactory;

    /**
     * Daftar atribut yang boleh diisi secara massal (mass assignment).
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'employee_id',    // ID karyawan yang menerima gaji
        'amount',         // Jumlah nominal gaji
        'payment_date',   // Tanggal pembayaran gaji
        'payment_status', // Status pembayaran: 'pending', 'paid', atau 'cancelled'
    ];

    /**
     * Casting kolom agar payment_date otomatis menjadi instance Carbon (tanggal).
     *
     * @var array<string, string>
     */
    protected $casts = [
        'payment_date' => 'datetime', // Memudahkan formatting tanggal saat digunakan
    ];

    /**
     * Relasi many-to-one: Gaji dimiliki oleh satu karyawan.
     * Menghubungkan model Salary dengan Employee berdasarkan employee_id.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
