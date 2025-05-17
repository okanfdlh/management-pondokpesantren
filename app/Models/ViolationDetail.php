<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ViolationDetail extends Model
{
    protected $fillable = ['violation_category_id', 'name'];

    public function category()
    {
        return $this->belongsTo(ViolationCategory::class, 'violation_category_id');
    }

}


