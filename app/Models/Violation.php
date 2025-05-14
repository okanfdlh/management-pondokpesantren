<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Violation extends Model
{
    use HasFactory;
    protected $table = 'violations';

    protected $fillable = [
        'santri_id',
        'violation_type',
        'description',
        'date',
    ];

    public function santri()
    {
        return $this->belongsTo(Santri::class, 'santri_id');
    }
}