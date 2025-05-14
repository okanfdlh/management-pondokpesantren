<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    use HasFactory;

    protected $table = 'santris'; // sesuaikan dengan nama tabel di database

    protected $fillable = [
        'foto',
        'nis',
        'nama',
        'jenis_kelamin',
        'tanggal_lahir',
        'alamat',
        'tahun_ajaran',
        'status',
    ];

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

    public function repatriations()
    {
        return $this->hasMany(Repatriation::class, 'santri_id');
    }
}
