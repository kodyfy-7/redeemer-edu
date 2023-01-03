<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'result_slug';
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function calendar_year()
    {
        return $this->belongsTo(CalendarYear::class);
    }

    
}
