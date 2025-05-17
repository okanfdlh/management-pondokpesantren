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
        'violation_detail_id',
    ];

    public function santri()
    {
        return $this->belongsTo(Santri::class, 'santri_id');
    }
    public function violationDetail()
    {
        return $this->belongsTo(ViolationDetail::class, 'violation_detail_id');
    }

}