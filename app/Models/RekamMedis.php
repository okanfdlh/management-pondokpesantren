<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    use HasFactory;
    protected $table = 'rekam_medis';
    protected $fillable = [
        'santri_id',
        'tanggal_kunjungan',
        'keluhan',
        'diagnosis',
        'tindakan',
    ];

    public function santri()
    {
        return $this->belongsTo(Santri::class, 'santri_id');
    }
}
