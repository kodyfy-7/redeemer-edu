<?php

namespace App\Http\Controllers\Users\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{
    Employee, 
    Classroom,
    Student,
    CalendarYear, 
    StudentAttendance,
};

class AttendanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:teacher');
    }

    public function index()
    {
        $employee = Employee::whereId(auth()->user()->employee_id)->first();
        
        if(($employee->classroom_id) === null)
        {
            return redirect()->route('teacher.dashboard')->with('error', 'Unauthorized access.');
        }

        $classroom_id = $employee->classroom_id;
        // $year = Year::latest('id')->first();
        $attendance_date = date('d/m/Y');
        $check_date_status = StudentAttendance::whereAttendanceDate($attendance_date)->whereClassroomId($classroom_id)->first();

        if($check_date_status)
        {
            return redirect()->route('teacher.dashboard')->with('error', 'Attendance taken already.');
        } 
        $students = Student::whereClassroomId($classroom_id)->get();

        return view('teacher.attendance.index', [
            'students' => $students
        ]);
    }

    public function store(Request $request)
    {   
        $employee = Employee::whereId(auth()->user()->employee_id)->first();
        $classroom_id = $employee->classroom_id;
        $year = CalendarYear::latest('id')->first();
        $attendance_status = $request->attendance;
        $attendance_date = date('d/m/Y');
        $check_date_status = StudentAttendance::whereAttendanceDate($attendance_date)->whereClassroomId($classroom_id)->first();
        
        if($check_date_status)
        {
            return redirect()->route('teacher.dashboard')->with('error', 'Attendance taken already.');
        } 

        // foreach ($attendance_status as $key => $value) 
        // {
        //     $form_data = array(
        //         'classroom_id' => $classroom_id, 
        //         'attendance_status' => $value, 
        //         'student_id' => $key, 
        //         'calendar_year_id' => $year->id, 
        //         'employee_id' => $employee->id,
        //         'attendance_date' => $attendance_date
        //     );

        //     StudentAttendance::create($form_data);            
        // }
        return redirect()->route('teacher.dashboard')->with('success', 'Attendance taken successfully.');
    }
}

        