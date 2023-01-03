<?php

namespace App\Services;

use App\Models\CalendarYear;
use Illuminate\Support\Collection;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Str;

class YearService {
    public function checkYear()
    {
        $year = CalendarYear::latest('id')->first();        
        return $year;
    }
}