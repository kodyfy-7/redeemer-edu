<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;


class Employee extends Model
{
    use HasFactory;
    //use HasSlug;

    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'employee_slug';
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function administrators()
    {
        return $this->hasMany(Administrator::class);
    }

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }

    public function ownClass()
    {
        return $this->hasOne(ClassroomTeacher::class);
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function subject()
    {
        return $this->hasOne(Subject::class);
    }
}
