<?php

namespace App\Http\Controllers\Users\Teacher;

use App\Http\Controllers\Controller;
use App\Services\YearService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\{
    Employee,
    Result,
    Student,
    StudentAttendance,
};

use Exception;

class StudentController extends Controller
{
    public function __construct(YearService $yearService)
    {
        $this->middleware('auth:teacher');
        $this->yearService = $yearService;
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
        //$subjects = Subject::whereClassroomCategoryId($cc_type)->get();
        $students = Student::whereClassroomId($employee->classroom_id)->orderBy('name', 'asc')->get();

        
        return view('teacher.student.index', [
            'classroom' => $classroom,
            //'subjects' => $subjects,
            'students' => $students,
        ]);
    }


    public function show(Student $student)
    {
        //return Result::with('year')->get();
        $year = $this->yearService->checkYear();        
        // $attendance = StudentAttendance::whereCalendarYearId($year->id)->whereStudentId($student->id)->first();
        $attendance = StudentAttendance::selectRaw('COUNT(CASE attendance_status WHEN "present" THEN 1 ELSE NULL END) as "present", COUNT(CASE attendance_status WHEN "absent" THEN 1 ELSE NULL END) as "absent", COUNT(*) as "all" ')->whereCalendarYearId($year->id)->whereStudentId($student->id)->first();

        $results = Result::whereStudentId($student->id)->get();
        // foreach ($results as $row) {
        //     return $row->year->id;
        // }
        //return $attendance;
        return view('teacher.student.show', [
            'student' => $student,
            'attendance' => $attendance,
            'results' => $results
        ]);
    }

    
}
