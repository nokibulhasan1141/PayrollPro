<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    // Columns that can be filled via mass assignment
    protected $fillable = [
        'employee_id',   // e.g., EMP001
        'name',
        'email',
        'department',
        'designation',
        'salary',
    ];

    // Employee has many leaves
    public function leaves()
    {
        return $this->hasMany(Leave::class);
    }
}
