<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    use HasFactory;

    protected $table = 'santris';

    protected $fillable = [
        'nis',
        'nama',
        'asrama',
        'kamar',
        'kelas',
        'jenis_kelamin',
        'tanggal_lahir',
        'alamat',
        'kelurahan',
        'kabupaten',
        'tahun_ajaran',
        'status',
        'wali_id',
    ];
    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'user_id');
    // }

    public function wali()
    {
        return $this->belongsTo(User::class, 'wali_id');
    }

    public function violations()
    {
        return $this->hasMany(Violation::class, 'santri_id');
    }

    public function achievements()
    {
        return $this->hasMany(Achievement::class, 'santri_id');
    }

    public function permissions()
    {
        return $this->hasMany(Permission::class, 'santri_id');
    }

    // public function repatriations()
    // {
    //     return $this->hasMany(Repatriation::class, 'santri_id');
    // }
}
