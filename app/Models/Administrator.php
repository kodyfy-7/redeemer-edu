<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Administrator extends Authenticatable
{
    use HasFactory;

    protected $guard = 'administrator';

    protected $guarded = [];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}

