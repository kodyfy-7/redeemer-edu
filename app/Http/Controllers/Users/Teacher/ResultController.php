<?php

namespace App\Http\Controllers\Users\Teacher;

use App\Http\Controllers\Controller;
use App\Services\YearService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StudentsImport;

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
        $this->middleware('auth:teacher');
        $this->yearService = $yearService;
    }
    
    public function index()
    {
        return redirect()->back()->with('error', 'Unauthorized access');
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
        $employee = Employee::whereId(auth()->user()->employee_id)->first();
        if(($employee->classroom_id) === null)
        {
            return redirect()->back()->with('error', 'Unauthorized access');
        }
        $result = Result::whereResultSlug($result)->first();    
        $year = CalendarYear::latest('id')->first(); 
        $category = ClassroomCategory::whereId($employee->classroom->classroom_category_id)->first();     
        $subjects = Subject::whereClassroomCategoryId($category->id)->count();
        $details = ResultDetail::where('result_id', $result->id)->get();
        $mks_obtained = $details->sum('total');
        //$mks_obtainable = $subjects * 100;
        $average = $mks_obtained / $subjects;
        switch ($average) {
            case $average >= 70:
                $grade = 'A';
            break;
            case $average >= 60.0 and $average <= 69.9:
                $grade = 'B';
            break;
            case $average >= 45.0 and $average <= 59.9:
                $grade = 'C';
            break;
            case $average >= 35.0 and $average <= 44.9:
                $grade = 'D';
            break;
            default:
                $grade = 'F';
            break;
        }   
        
        return view('teacher.result.show', [
            'details' => $details,
            'year' => $year,
            'result' => $result,
            'subjects' => $subjects,
            'mks_obtained' => $mks_obtained,
            'average' => $average, 
            'grade' => $grade,
        ]);
    }

    public function test()
    {
        return view('teacher.result.temp');
    }

    public function create() 
    {
        //return auth()->user()->employee_id;
        try{
            //dd(1);
            $employee = Employee::whereId(auth()->user()->employee_id)->first();
            if(($employee->classroom_id) === null)
            {
                return redirect()->back()->with('error', 'Unauthorized access');
            }

            $classroom_id = $employee->classroom_id;
            $classroom = Classroom::where('id', $classroom_id)->first();
            //return $classroom->classroom_category_id;
            $subjects = Subject::whereClassroomCategoryId(1)->get();
            //return $subjects;
            return view('teacher.result.upload', [
                'subjects' => $subjects
            ]);
            
        } catch(Exception $e)
        {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'An error has occurred. Please try again later.');
        }        
    }   

    public function store(Request $request)
    {
        $data = request()->validate([
            'mks_obtained' => ['required'],
            'average' => ['required'],
            'grade' => ['required'],
            'comment' => ['required'],
        ]); 

        Result::whereId($request->result_id)->update([
            'mks_obtained' => $request->mks_obtained,
            'average' => $request->average,
            'grade' => $request->grade,
            'comment' => $request->comment,
            'session_average' => $request->session_average,
            'result_status' => 'set'
        ]);

        return redirect()->route('teacher.results.index')->with('success', 'Data saved successfully');
    }
 
    public function upload(Request $request)
    {
        $data = request()->validate([
            'subject_id' => ['required', 'integer'],
            //'assessment_type' => ['required'],
            'upload_file' => ['required', 'file:csv'],
        ]); 
        //return $request->assessment_type;
        $extension = $request->file('upload_file')->getClientOriginalExtension();
        if ($extension == 'csv') {
            $upload = $request->file('upload_file');
            $getPath = $upload->getRealPath();

            $file = fopen($getPath, 'r');
            $headerLine = true;
            $Errors = [];
            while (($columns = fgetcsv($file, 1000, ","))!== FALSE) {
                $num = count($columns);  
                
                if($num === 9)
                    {
                        if($headerLine) { $headerLine = false; }
                        
                        else {
                        
                            if ($columns[0] == "")
                                continue;
                            $data =  $columns;
                            foreach ($data as $key => $value) {
                                $reg_id = $data[0];
                                $assignment = $data[1];
                                $project = $data[2];
                                $assessment = $data[3];
                                $exam = $data[4];
                                $total = $data[5];
                                $grade = $data[6];
                                $comment = $data[7];
                            }

                            $student = Student::whereRegistrationId($reg_id)->first();
                            if ($student) {
                                $result = Result::whereStudentId($student->id)->latest()->first();
                                //return $result;
                                ResultDetail::updateOrCreate([
                                    'result_id' => $result->id,
                                    'subject_id' => $request->subject_id, 
                                    'project' => $project,
                                    'assignment' => $assignment,
                                    'assessment' => $assessment,
                                    'exam' => $exam,
                                    'total' => $total,
                                    'grade' => $grade,
                                ]);
                                // if($request->assessment_type == 'project')
                                // {
                                //     //return 1;
                                //     //$table = 'projects';
                                //     DB::table('projects')->insert([
                                //         'result_id'     => $result->id,
                                //         'subject_id'    => $request->subject_id, 
                                //         'score' => $score,
                                //     ]);
                                // } elseif($request->assessment_type == 'continous_assessment')
                                // {
                                //     //$table = 'projects';
                                //     DB::table('continous_assessments')->insert([
                                //         'result_id'     => $result->id,
                                //         'subject_id'    => $request->subject_id, 
                                //         'score' => $score,
                                //     ]);
                                // } elseif($request->assessment_type == 'exam')
                                // {
                                //     $project = Project::whereResultId($result->id)->whereSubjectId($request->subject_id)->first();
                                //     $assessment = ContinousAssessment::whereResultId($result->id)->whereSubjectId($request->subject_id)->first();
                                //     if($project && $assessment)
                                //     {
                                //         // DB::table('exams')->insert([
                                //         //     'result_id'     => $result->id,
                                //         //     'subject_id'    => $request->subject_id, 
                                //         //     'score' => $score,
                                //         // ]);
                                //         Exam::updateOrCreate([
                                //             'result_id'     => $result->id,
                                //             'subject_id'    => $request->subject_id, 
                                //             'score' => $score,
                                //         ]);

                                //         //get and collate results
                                        
                                //         $exam = Exam::whereResultId($result->id)->whereSubjectId($request->subject_id)->first();

                                //         $total = $project->score + $assessment->score + $exam->score;

                                //         switch ($total) {
                                //             case $total >= 70:
                                //                 $grade = 'A';
                                //             break;
                                //             case $total >= 60 and $total <= 69:
                                //                 $grade = 'B';
                                //             break;
                                //             case $total >= 45 and $total <= 59:
                                //                 $grade = 'C';
                                //             break;
                                //             case $total >= 35 and $total <= 44:
                                //                 $grade = 'D';
                                //             break;
                                //             default:
                                //                 $grade = 'F';
                                //             break;
                                //             }   

                                //         ResultDetail::updateOrCreate([
                                //             'result_id' => $result->id,
                                //             'subject_id' => $request->subject_id,
                                //             'project' => $project->score,
                                //             'assessment' => $assessment->score,
                                //             'exam' => $exam->score,
                                //             'total' => $total,
                                //             'grade' => $grade
                                //         ]);
                                //     } else {
                                //         array_push($Errors, "Project or Asessment score is missing for ". $reg_id);
                                //     }
                                    
                                // } else {

                                // }
                                $success = true;
                            }else {
                                array_push($Errors, $reg_id." not found");
                            }
                        }
                    } else {
                        return redirect()->back()->with('error', 'Wrong template');
                        //return response()->json(["success" => false, "error" => "Wrong template, please use the correct one."], 206);
                    }
            }

            if ($Errors) {
                return redirect()->back()->with(['error', $Errors]);
                //return response()->json(["success" => true, "error" => $Errors]);
            } elseif($success && $Errors) {
                return redirect()->back()->with(['success', 'Data created successfully. But with '.$Errors]);
                //return response()->json(["success" => true, "message" => "File uploaded successfully", "error" => $Errors]);
            } else{
                return redirect()->back()->with('success', 'Data created successfully.');
                //return response()->json(["success" => true, "message" => "File uploaded successfully"]);
            }
        
        } else {
            return response()->json(["success" => true, "error" => "file format not supported"]);
        }
    }
    
}
