<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Guardian extends Authenticatable
{
    use HasFactory;

    protected $guard = 'guardian';

    protected $guarded = [];

    public function guardianWards()
    {
        return $this->hasMany(GuardianWard::class);
    }
}
