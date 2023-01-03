<?php

namespace App\Services;

use App\Models\Student;
use Illuminate\Support\Collection;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Str;

class RegistrationService {
    public function regNumber()
    {
        $last_user = Student::select('id')->latest()->first();
        // if($last_user)
        // {
        //    // dd($last_user->registration_id);
        //     $last_reg_no = $last_user->registration_id;
        //     //return $last_reg_no;
        // $last_reg_no = explode("/", $last_reg_no);

        // $new_reg_no = $last_reg_no[3] + $last_user->id;
        // $new_reg_no = $last_reg_no[0] .'/'. $last_reg_no[1] .'/'. $last_reg_no[2] .'/'. $new_reg_no;

        // return $new_reg_no;
        // }
        
        // $new_reg_no = 'RTIS/2021/2022/1';

        // return $new_reg_no;
        if(!$last_user)
        {
            $new_reg_no = 'RTIS/2021/2022/1';
            return $new_reg_no;
        }
        
        $new_reg_no = $last_user->id + 1;
        $new_reg_no = 'RTIS/2021/2022/'.$new_reg_no;
        return $new_reg_no;
        //dd($new_reg_no);
    }
}