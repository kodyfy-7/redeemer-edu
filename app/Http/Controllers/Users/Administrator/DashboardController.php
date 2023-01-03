<?php

namespace App\Http\Controllers\Users\Administrator;

use App\Http\Controllers\Controller;
use App\Services\YearService;
use Illuminate\Http\Request;
use App\Models\{
    Student,
    Employee,
};

class DashboardController extends Controller
{
    public function __construct(YearService $yearService)
    {
        $this->middleware('auth:administrator');
        $this->yearService = $yearService;
    }

    public function index()
    {
        $year = $this->yearService->checkYear();

        $students = Student::count();
        $employees = Employee::count();
        
        return view('administrator.dashboard', [
            'year' => $year,
            'employees' => $employees,
            'students' => $students,
        ]);
    }
}
