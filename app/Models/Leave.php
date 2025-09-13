<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Leave extends Model
{
    use HasFactory;

    // Columns that can be mass assigned
    protected $fillable = [
        'employee_id',  // links to users.id
        'start_date',
        'end_date',
        'type',         // Casual, Sick, Earned
        'status',       // pending, approved, rejected
        'reason',
    ];

    // A leave belongs to a user (employee)
    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id', 'id');
    }
}
