<?php

namespace App\Http\Controllers\Users\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 
use App\Models\{
    Employee,
    Classroom,
    Student,
    Subject,
    Teacher,
};
use App\Services\CredsService;
use Exception;

class ClassroomController extends Controller
{
    public function __construct(CredsService $credsService)
    {
        $this->middleware('auth:teacher');
        $this->credsService = $credsService;
    }

    public function index()
    {
        $employee = Employee::whereId(auth()->user()->employee_id)->first();
        if(($employee->classroom_id) === null)
        {
            return redirect()->back()->with('error', 'Unauthorized access.');
        }

        $classroom = $employee->classroom->classroom_name;
        $section = $employee->classroom->classroom_section;
        $classroom = $classroom.' '.$section;
        $cc_type = $employee->classroom->classroomCategory->id;
        $subjects = Subject::whereClassroomCategoryId($cc_type)->get();
        $students = Student::whereClassroomId($employee->classroom_id)->orderBy('name', 'asc')->get();

        return view('teacher.classroom.index', [
            'classroom' => $classroom,
            'subjects' => $subjects,
            'students' => $students,
        ]);
    }

    
}
