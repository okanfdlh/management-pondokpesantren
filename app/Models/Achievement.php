<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;
    protected $table = 'achievements'; // sesuaikan dengan nama tabel di database

    protected $fillable = [
        'santri_id',
        'achievement_type',
        'description',
        'date',
    ];

    public function santri()
    {
        return $this->belongsTo(Santri::class, 'santri_id');
    }
}