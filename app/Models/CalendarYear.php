<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalendarYear extends Model
{
    use HasFactory;

    public function results()
    {
        return $this->hasMany(Result::class);
    }
}
