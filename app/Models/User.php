<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Model User
 * Merepresentasikan data pengguna dalam sistem autentikasi Laravel.
 * Berelasi satu-satu dengan model Employee.
 */
class User extends Authenticatable
{
    /**
     * Trait HasFactory digunakan untuk mendukung fitur factory (biasanya untuk seeding/testing).
     * Trait Notifiable memungkinkan model menerima notifikasi.
     */
    use HasFactory, Notifiable;

    /**
     * Atribut yang boleh diisi secara massal (mass assignment).
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',     // Nama lengkap user
        'email',    // Email user (digunakan untuk login)
        'password', // Password (akan di-hash oleh Laravel)
        'role',     // Role user (misal: admin, karyawan)
    ];

    /**
     * Atribut yang disembunyikan saat model diserialisasi ke array/JSON.
     * Biasanya untuk alasan keamanan.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',        // Menyembunyikan password dari output JSON
        'remember_token',  // Token "remember me"
    ];

    /**
     * Tipe casting untuk atribut tertentu.
     * Casting ini mengatur bagaimana data disimpan dan ditampilkan.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime', // Konversi otomatis menjadi objek Carbon
            'password' => 'hashed',            // Otomatis hash saat diset
        ];
    }

    /**
     * Relasi one-to-one antara User dan Employee.
     * Seorang user dapat memiliki satu data karyawan.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function employee()
    {
        return $this->hasOne(Employee::class);
    }
}
