<?php

namespace App\Http\Controllers\Users\Administrator;

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
    User,
};
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Support\Facades\DB;

class ResultController extends Controller
{
    public function index()
    {
        $classrooms = Classroom::get();
        $subjects = Subject::groupBy('subject_title')->get();
        return view('administrator.result.index', [
            'subjects' => $subjects,
            'classrooms' => $classrooms
        ]);
    }
    public function store(Request $request)
    {
        $data = request()->validate([
            'subject_id' => ['required', 'integer'],
            'classroom_id' => ['required', 'integer'],
            'upload_file' => ['required', 'file:csv'],
        ]); 

        $extension = $request->file('upload_file')->getClientOriginalExtension();
        if ($extension == 'csv') {
            $upload = $request->file('upload_file');
            $subject_id = $request->subject_id;
            $classroom_id= $request->classroom_id;
            $getPath = $upload->getRealPath();

            $file = fopen($getPath, 'r');
            $headerLine = true;
            $errors = [];
            while (($columns = fgetcsv($file, 1000, ","))!== FALSE) {
                $num = count($columns);  
                if($num === 10)
                {
                    if($headerLine) { $headerLine = false; }
                    
                    else {
                    
                        if ($columns[0] == "")
                            continue;
                        $data =  $columns;
                        foreach ($data as $key => $value) {
                            $reg_id = $data[1];
                            $project = $data[3];
                            $assignment = $data[4];
                            $assessment = $data[5];
                            $exam = $data[6];
                            $total = $data[7];
                        }

                        $student = Student::whereRegistrationId($reg_id)->whereClassroomId($classroom_id)->first();
                        if ($student) { 
                            // switch ($total) {
                            //     case $total >= 90:
                            //         $grade = 'A+';
                            //         $comment = 'Outstanding';
                            //     break;
                            //     case $total >= 80 and $total <= 89:
                            //         $grade = 'A';
                            //         $comment = 'Excellent';
                            //     break;
                            //     case $total >= 70 and $total <= 79:
                            //         $grade = 'B';
                            //         $comment = 'Very Good';
                            //     break;
                            //     case $total >= 60 and $total <= 69:
                            //         $grade = 'C';
                            //         $comment = 'Good';
                            //     break;
                            //     case $total >= 50 and $total <= 59:
                            //         $grade = 'D';
                            //         $comment = 'Pass';
                            //     break;
                            //     case $total >= 40 and $total <= 49:
                            //         $grade = 'E';
                            //         $comment = 'Fair';
                            //     break;
                            //     default:
                            //         $grade = 'F';
                            //         $comment = 'Fail';
                            //     break;
                            // }  

                            if ($total >= 90 && $total <= 100) {
                                $grade = 'A+';
                                    $comment = 'Outstanding';
                              } elseif ($total >= 80 && $total < 90) {
                                $grade = 'A';
                                    $comment = 'Excellent';
                              } elseif ($total >= 70 && $total < 80) {
                                $grade = 'B';
                                    $comment = 'Very Good';
                              } elseif ($total >= 60 && $total < 70) {
                                $grade = 'C';
                                    $comment = 'Good';
                              } elseif ($total >= 50 && $total < 60) {
                                $grade = 'D';
                                    $comment = 'Pass';
                              } elseif ($total >= 40 && $total < 50) {
                                $grade = 'E';
                                    $comment = 'Fair';
                              } else {
                                $grade = "F";
                                $comment = 'Fail';
                            }
                            $result = Result::whereStudentId($student->id)->latest()->first();
                            

                            if(ResultDetail::whereResultId($result->id)->whereSubjectId($subject_id)->doesntExist())
                            {
                                ResultDetail::updateOrCreate([
                                    'result_id' => $result->id,
                                    'subject_id' => $subject_id, 
                                    'project' => $project,
                                    'assignment' => $assignment,
                                    'assessment' => $assessment,
                                    'exam' => $exam,
                                    'total' => $total,
                                    'grade' => $grade,
                                    'comment' => $comment,
                                ]);
                            
          
                       $x = DB::table('results')
        ->join('result_details', 'results.id', '=', 'result_details.result_id')
        ->select('result_details.id', 'result_details.total', 'results.student_id', DB::raw('@row_number:=@row_number+1 as position'))
        ->crossJoin(DB::raw('(SELECT @row_number:=0) as init'))
        ->where('result_details.subject_id', $subject_id)
        ->where('results.classroom_id', $classroom_id)
        ->groupBy('result_details.id', 'results.student_id')
        ->orderBy(DB::raw('result_details.total'), 'desc')
        ->get();         
                                
                                foreach ($x as $student) {
                                    DB::table('result_details')
                                      ->where('result_id', $student->id)
                                      ->update(['position' => $student->position]);
                                }

                                $result_t = ResultDetail::select('total')->whereResultId($result->id)->whereSubjectId($subject_id)->first();
                                
                                $mks_obtained = $result->mks_obtained + $result_t->total;

                                Result::whereId($result->id)->update([
                                    'mks_obtained' => $mks_obtained
                                ]);
                                $success = true;
                            } else{
                                array_push($errors, $reg_id." result already uploaded");
                            }
                        }else {
                            array_push($errors, $reg_id." is not registered in this class");
                        }
                    }
                } else {
                    return redirect()->back()->with('error', 'Wrong template');
                }
            }

            // if ($errors) {
            //     return redirect()->back()->withErrors($errors);
            //     //return redirect()->back()->with(['error', 'An error occured, please check the file.']);
                
            // } elseif ($success && count($errors) > 0) {
            //     return redirect()->back()->withErrors($errors);
            // } else {
            //     return redirect()->back()->with(['success', 'Data uploaded successfully.']);
            // }
            if ($errors) {
                //return redirect()->back()->withErrors($errors);
                return redirect()->back()->with(['error', 'An error occured, please check the file.']);
                
            } elseif($success && $errors) {
                return redirect()->back()->with(['success', 'Data uploaded successfully, but some records are missing.']);
            } else{
                return redirect()->back()->with('success', 'Data uploaded successfully.');
            }
            // if($success && $errors) {
            //     return redirect()->back()->with(['success', 'Data uploaded successfully.']);
            // } else{
            //     return redirect()->back()->with('success', 'Data uploaded successfully.');
            // }
        
        } else {
            return redirect()->back()->with('error', 'File format not supported');
        }
    }
    
    public function show($result)
    {
        $result = Result::whereResultSlug($result)->first();   
        $student = Student::whereId($result->student_id)->first();       
        $year = CalendarYear::latest('id')->first(); 
        $details = ResultDetail::join('subjects', 'result_details.subject_id', '=', 'subjects.id')->where('result_id', $result->id)->orderBy('subjects.subject_title')->get();
       // return $student->student_slug;
        if ($details->isEmpty()) {
            // Return a response indicating that no data was found
            return redirect()->back()->with('error', 'Data not found');
        }
        $mks_obtained = $details->sum('total');
        $average = $mks_obtained/count($details);  
        if ($average >= 90 && $average <= 100) {
            $grade = 'A+';
                $comment = 'Outstanding';
          } elseif ($average >= 80 && $average < 90) {
            $grade = 'A';
                $comment = 'Excellent';
          } elseif ($average >= 70 && $average < 80) {
            $grade = 'B';
                $comment = 'Very Good';
          } elseif ($average >= 60 && $average < 70) {
            $grade = 'C';
                $comment = 'Good';
          } elseif ($average >= 50 && $average < 60) {
            $grade = 'D';
                $comment = 'Pass';
          } elseif ($average >= 40 && $average < 50) {
            $grade = 'E';
                $comment = 'Fair';
          } else {
            $grade = "F";
            $comment = 'Fail';
        }
        // switch ($average) {
        //     case $average >= 90:
        //         $grade = 'A+';
        //         $comment = 'Outstanding';
        //     break;
        //     case $average >= 80 and $average <= 89:
        //         $grade = 'A';
        //         $comment = 'Excellent';
        //     break;
        //     case $average >= 70 and $average <= 79:
        //         $grade = 'B';
        //         $comment = 'Very Good';
        //     break;
        //     case $average >= 60 and $average <= 69:
        //         $grade = 'C';
        //         $comment = 'Good';
        //     break;
        //     case $average >= 50 and $average <= 59:
        //         $grade = 'D';
        //         $comment = 'Pass';
        //     break;
        //     case $average >= 40 and $average <= 49:
        //         $grade = 'E';
        //         $comment = 'Fair';
        //     break;
        //     default:
        //         $grade = 'F';
        //         $comment = 'Fail';
        //     break;
        // }  
       
        
        return view('administrator.result.show', [
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
}