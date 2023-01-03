<?php

namespace App\Http\Controllers;

use App\Services\YearService;
use Illuminate\Http\Request;
use App\Models\{
    Student,
    Employee,
};

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(YearService $yearService)
    {
        $this->middleware('auth');
        $this->yearService = $yearService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $year = $this->yearService->checkYear();
        if(auth()->user()->role->role_slug == 'admin')
        {
            $students = Student::count();
            $employees = Employee::count();
            
            return view('panel.home', [
                'year' => $year,
                'employees' => $employees,
                'students' => $students,
            ]);
        }
        return view('panel.home', [
            'year' => $year
        ]);
    }
}
