<?php

namespace App\Http\Controllers\Users\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Services\YearService;
use Illuminate\Http\Request;
class DashboardController extends Controller
{
    public function __construct(YearService $yearService)
    {
        $this->middleware('auth:teacher');
        $this->yearService = $yearService;
    }

    public function index()
    {
        $year = $this->yearService->checkYear();
        $attendance = Student::selectRaw('COUNT(CASE gender WHEN "male" THEN 1 ELSE NULL END) as "male", COUNT(CASE gender WHEN "female" THEN 1 ELSE NULL END) as "female", COUNT(*) as "all" ')->whereClassroomId(auth()->user()->employee->classroom_id)->first();
        $students = Student::whereClassroomId(auth()->user()->employee->classroom_id)->get();
        return view('teacher.dashboard', [
            'year' => $year,
            'attendance' => $attendance,
            'students' => $students
        ]);
    }
}
