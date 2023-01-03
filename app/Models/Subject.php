<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'subject_slug';
    }

    public function classroomCategory()
    {
        return $this->belongsTo(ClassroomCategory::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function classroom_subjects()
    {
        return $this->hasMany(ClassroomTeacherSubject::class);
    }

    public function st()
    {
        return $this->hasOne(SubjectTeacher::class);
    }
    
    public function resultDetails()
    {
        return $this->hasMany(ResultDetails::class);
    }
}
