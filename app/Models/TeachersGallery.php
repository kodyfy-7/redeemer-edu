<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeachersGallery extends Model
{
    use HasFactory;
    
    protected $table = 'teachers_galleries';


    protected $fillable = ['name','subject','image'];
}
