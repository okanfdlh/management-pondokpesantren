<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    // Field yang diizinkan untuk mass assignment
    protected $fillable = [
        'name',
        'email',
        'phone',
        'position',
        'user_id',
    ];

    /**
     * Relasi ke model User.
     * Setiap karyawan mungkin terkait dengan satu user login.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke model Salary.
     * Setiap karyawan bisa memiliki banyak catatan gaji.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function salaries()
    {
        return $this->hasMany(Salary::class);
    }
}
