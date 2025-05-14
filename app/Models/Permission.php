<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $table = 'permissions';

    protected $fillable = [
        'santri_id',
        'status',                // Diproses, Diizinkan, Ditolak
        'kategori_perizinan',    // Meninggal, Sakit, Haji/Umroh, dll
        'reason',
        'request_date',
    ];

    // Relasi ke model Santri
    public function santri()
    {
        return $this->belongsTo(Santri::class, 'santri_id');
    }
}
