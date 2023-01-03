<?php

namespace App\Services;

use App\Models\Employee;
use Illuminate\Support\Collection;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Str;

class CredsService {
    public function username($name)
    {
        $rand = mt_rand(0,100);
        $strpusername = str_replace(' ', '', $name); 
        $strlowusername = strtolower($strpusername);
        $username = $strlowusername . $rand;
        
        return $username;
    }

    public function password()
    {
        $alpha = "abcdefghijklmnopqrstuvwxyz";
        $alpha_upper = strtoupper($alpha);
        $numeric = "0123456789";
        $special = "!@$#*%";
        $chars = $alpha . $alpha_upper . $numeric . $special;
        $length = 10;
        $chars = str_shuffle($chars);
        $len = strlen($chars);
        $password = "";
        for($i=0;$i<$length;$i++) {
            $password = substr($chars, rand(0, $len-1),1);
        }
        $password = str_shuffle($password);

        return $password;
    }

    public function slug()
    {
        $slug = Str::uuid();
        if(Employee::whereEmployeeSlug($slug)->exists())
        {
            $slug = $slug . mt_rand(0,100);
        }
        return $slug;
    }
}