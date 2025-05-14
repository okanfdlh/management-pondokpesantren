<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repatriation extends Model
{
    use HasFactory;
    protected $table = 'repatriations'; // sesuaikan dengan nama tabel di database
    protected $fillable = [
        'santri_id',
        'status', // Diterima, Ditolak, Diproses
        'health_reason',
        'request_date',
    ];

    // Relasi ke santri
    public function santri()
    {
        return $this->belongsTo(Santri::class, 'santri_id');
    }
}