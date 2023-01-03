<?php

namespace App\Http\Controllers\Users\Guardian;

use App\Http\Controllers\Controller;
use App\Services\YearService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StudentsImport;
use PDF;

use App\Models\{
    CalendarYear,
    Classroom,
    ClassroomCategory,
    ContinousAssessment,
    Employee,
    Exam,
    Student,
    Subject,
    Result,
    Project,
    ResultDetail,
    StudentAttendance,
};
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Support\Facades\DB;

class ResultController extends Controller
{
    public function __construct(YearService $yearService)
    {
        $this->middleware('auth:guardian');
        $this->yearService = $yearService;
    }
    
    public function index()
    {
        $employee = Employee::whereId(auth()->user()->employee_id)->first();
        if(($employee->classroom_id) === null)
        {
            return redirect()->back()->with('error', 'Unauthorized access');
        }
        //if not class teacher return

        $classroom_id = $employee->classroom_id;
        $classroom = Classroom::where('id', $classroom_id)->first();
        $year = CalendarYear::latest('id')->first(); 
        $results = Result::whereClassroomId($classroom_id)->whereCalendarYearId($year->id)->get();
        $subjects = Subject::whereClassroomCategoryId($classroom->classroom_category_id)->get();
        return view('teacher.result.index', [
            'subjects' => $subjects,
            
            'results' => $results
        ]);
    }

    public function show($result)
    {
        $result = Result::whereResultSlug($result)->first();          
        $year = CalendarYear::latest('id')->first(); 
        $details = ResultDetail::where('result_id', $result->id)->get();
        $mks_obtained = $details->sum('total');
        $average = $mks_obtained/count($details);  
        switch ($average) {
            case $average >= 90:
                $grade = 'A+';
                $comment = 'Outstanding';
            break;
            case $average >= 80 and $average <= 89:
                $grade = 'A';
                $comment = 'Excellent';
            break;
            case $average >= 70 and $average <= 79:
                $grade = 'B';
                $comment = 'Very Good';
            break;
            case $average >= 60 and $average <= 69:
                $grade = 'C';
                $comment = 'Good';
            break;
            case $average >= 50 and $average <= 59:
                $grade = 'D';
                $comment = 'Pass';
            break;
            case $average >= 40 and $average <= 49:
                $grade = 'E';
                $comment = 'Fair';
            break;
            default:
                $grade = 'F';
                $comment = 'Fail';
            break;
        }    
        
        return view('guardian.result.show', [
            'details' => $details,
            'year' => $year,
            'result' => $result,
            'average' => $average,
            'mks_obtained' => $mks_obtained,
            'average' => $average, 
            'grade' => $grade,
            'comment' => $comment
        ]);
    }

    public function generatePDF($result)
    {
        $result = Result::whereResultSlug($result)->first();          
        $year = CalendarYear::latest('id')->first(); 
        $details = ResultDetail::where('result_id', $result->id)->get();
        $mks_obtained = $details->sum('total');
        $average = $mks_obtained/count($details);  
        switch ($average) {
            case $average >= 90:
                $grade = 'A+';
                $comment = 'Outstanding';
            break;
            case $average >= 80 and $average <= 89:
                $grade = 'A';
                $comment = 'Excellent';
            break;
            case $average >= 70 and $average <= 79:
                $grade = 'B';
                $comment = 'Very Good';
            break;
            case $average >= 60 and $average <= 69:
                $grade = 'C';
                $comment = 'Good';
            break;
            case $average >= 50 and $average <= 59:
                $grade = 'D';
                $comment = 'Pass';
            break;
            case $average >= 40 and $average <= 49:
                $grade = 'E';
                $comment = 'Fair';
            break;
            default:
                $grade = 'F';
                $comment = 'Fail';
            break;
        }    
        
        $pdf = PDF::loadView('myPDF', compact(
            'details',
            'year',
            'result',
            'average',
            'mks_obtained',
            'average', 
            'grade',
            'comment'
        ));
        return $pdf->download('result.pdf');
        // return view('myPdf', [
        //     'details' => $details,
        //     'year' => $year,
        //     'result' => $result,
        //     'average' => $average,
        //     'mks_obtained' => $mks_obtained,
        //     'average' => $average, 
        //     'grade' => $grade,
        //     'comment' => $comment
        // ]);
        
        // $result = Result::whereResultSlug($result)->first();    
        // $year = CalendarYear::latest('id')->first(); 
        // $details = ResultDetail::where('result_id', $result->id)->get();
        // $data = [
        //     'title' => 'Uche',
        //     'date' => date('m/d/Y')
        // ];
        // //$results = Result::all();
        // $details = ResultDetail::all();
        // //return $result;
        // $pdf = PDF::loadView('myPDF', compact('result', 'year', 'details'));
        // //$pdf = PDF::loadView('guardian.result.pdf', compact('result', 'year', 'details'));
        // return $pdf->download('result.pdf');
    }    
}
