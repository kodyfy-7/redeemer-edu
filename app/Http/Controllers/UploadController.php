<?php

namespace App\Http\Controllers;

//use App\Http\Controllers\Controller;
use App\Imports\StudentsImport;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
  
use App\Models\{
    Administrator,
    Classroom,
    Employee,
    Subject,
    Teacher,
    Role,
    Student,
    Result,
    ResultDetail,
    CalendarYear,
    Guardian,
    GuardianWard,
    User
};
use App\Services\CredsService;
use App\Services\RegistrationService;
use App\Services\YearService;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UploadController extends Controller
{
    public function __construct(CredsService $credsService)
    {
        $this->credsService = $credsService;
    }


    public function uploadTeacher(Request $request)
    {
        $extension = $request->file('upload_file')->getClientOriginalExtension();
        if ($extension == 'csv') {
            $upload = $request->file('upload_file');
            $getPath = $upload->getRealPath();

            $file = fopen($getPath, 'r');
            $headerLine = true;
            $Errors = [];

            while (($columns = fgetcsv($file, 1000, ","))!== FALSE) {
                //count columns to verify template
                $num = count($columns);
                if($num === 2)
                {
                    if($headerLine) { $headerLine = false; }                        
                    else {                        
                        if ($columns[0] == "")
                            continue;
                        $data =  $columns;
                        foreach ($data as $key => $value) {
                            $name = $data[0];
                            $phone = $data[1];
                        }

                            if (!DB::table('employees')->wherePhoneNumber($phone)->exists()) 
                            {
                                $username = $this->credsService->username($name);
                                //$password = $this->credsService->password();
                                $hash = bcrypt('12345678');
                                $slug = $this->credsService->slug();
                                $employee = Employee::create([
                                    'name' => $name,
                                    'role_id' => 2,
                                    'phone_number' => $phone,
                                    'employee_slug' => $slug,
                                ]);

                                Teacher::create([
                                    'employee_id' => $employee->id,
                                    'username' => $username,
                                    'password' => $hash,
                                ]);
                                $success = true;
                                
                                
                            }else {
                                array_push($Errors, "Account does not exist for ".$name);  
                            }   
                        
                    }
                } else {
                    return response()->json(["success" => false, "error" => "Wrong template, please use the valid format."], 206);
                }
            }

            if ($Errors) {
                return response()->json(["success" => true, "error" => $Errors]);
            } elseif($success && $Errors) {
                return response()->json(["success" => true, "message" => "File uploaded successfully", "error" => $Errors]);
            } else
                return response()->json(["success" => true, "message" => "File uploaded successfully"]);
        } else {
            return response()->json(["success" => false, "error" => "file format not supported"], 415);
        }    
            
    }

    public function uploadStudent(Request $request)
    {
        $data = request()->validate([
                'upload_file' => ['required', 'file:csv'],
                'classroom_id' => ['required', 'integer'],
        ]); 
        $extension = $request->file('upload_file')->getClientOriginalExtension();
        if ($extension == 'csv') {
            $upload = $request->file('upload_file');
            $getPath = $upload->getRealPath();

            $file = fopen($getPath, 'r');
            $headerLine = true;
            $Errors = [];

            while (($columns = fgetcsv($file, 1000, ","))!== FALSE) {
                //count columns to verify template
                $num = count($columns);
                if($num === 5)
                {
                    if($headerLine) { $headerLine = false; }                        
                    else {                        
                        if ($columns[0] == "")
                            continue;
                        $data =  $columns;
                        foreach ($data as $key => $value) {
                            $reg_no = $data[0];
                            $surname = $data[1];
                            $middle_name = $data[2];
                            $firstname = $data[3];
                            $dob = $data[4];
                        }

                        $name = $surname . ' ' . $middle_name .' '. $firstname; 
                            if (!DB::table('users')->where('reg_no', $reg_no)->exists()) 
                            {
                                // $student_password = $this->credsService->password();
                                // $hash_student_password = bcrypt($student_password);
                                // $parent_password = $this->credsService->password();
                                //$hash_parent_password = bcrypt($parent_password);
                                $student_slug = $this->credsService->slug();
                                $result_slug = $this->credsService->slug();
                                //$parent_slug = $this->credsService->slug();

                                $student = Student::create([
                                    'date_of_birth' => $dob,
                                    'name' => $name,
                                    //'registration_id' => $reg_no,
                                    'classroom_id' => $request->classroom_id,
                                    'student_slug' => $student_slug,
                                ]);
                    
                                User::create([
                                    'student_id'=> $student->id,
                                    'reg_no' => $reg_no,
                                    'password' => bcrypt('12345678')
                                ]);
    
                                $year = CalendarYear::latest('id')->first();
                                Result::create([
                                    'calendar_year_id' => $year->id,
                                    'student_id' => $student->id,
                                    'classroom_id' => $request->classroom_id,
                                    'result_slug' => $result_slug
                                ]); 
                                $success = true;                                
                            }else {
                                array_push($Errors, "Account exist for ".$name);  
                            }   
                        
                    }
                } else {
                    return response()->json(["success" => false, "error" => "Wrong template, please use the valid format."], 206);
                }
            }

            if ($Errors) {
                return response()->json(["success" => true, "error" => $Errors]);
            } elseif($success && $Errors) {
                return response()->json(["success" => true, "message" => "File uploaded successfully", "error" => $Errors]);
            } else
                return response()->json(["success" => true, "message" => "File uploaded successfully"]);
        } else {
            return response()->json(["success" => false, "error" => "file format not supported"], 415);
        }    
            
    }

    public function removeSubject(Request $request)
    {
        $subject_id = 38;
        $classroom_id = 8;
        $t = DB::table('result_details')
            ->select('results.id as result_id', 'result_details.id as result_detail_id', 'results.mks_obtained', 'result_details.total as total')
            ->join('results', 'results.id', '=', 'result_details.result_id')
            ->where('subject_id', $subject_id)
            ->where('classroom_id', $classroom_id)
            ->get();
        return count($t);
            //return $t;
        foreach($t as $row)
        {
            $total = $row->total;
            $mks_obtained = $row->mks_obtained;
            $new_mks = $mks_obtained - $total;
            Result::whereId($row->result_id)->update([
                'mks_obtained' => $new_mks
            ]);

           ResultDetail::whereId($row->result_detail_id)->delete();
            //return array($row->result_detail_id, $row->result_id);

        }
        return count($t);
    }

    public function removeClassResult()
    {
        $classroom_id = 8;
        $classrooms = DB::table('results')->where('classroom_id', $classroom_id)->get();
        foreach($classrooms as $row)
        {
            ResultDetail::whereResultId($row->id)->delete();
            Result::whereId($row->id)->update([
                'mks_obtained' => null
            ]);
        }
        return 'completed';

    }

    public function migrateUser(Request $request)
    {
        $admins = DB::table('administrators')->get();
        foreach($admins as $admin)
        {
            $user = User::create([
                'username' => $admin->username,
                'password' => $admin->password,
                'role_id' => 1
            ]);

            Employee::whereId($admin->employee_id)->update([
                'user_id' => $user->id
            ]);
        }

        $guardians = DB::table('guardians')->get();
        foreach($guardians as $guardian)
        {
            $user = User::create([
                'username' => $guardian->username,
                'password' => $guardian->password,
                'role_id' => 4
            ]);

            Guardian::whereId($guardian->id)->update([
                'user_id' => $user->id
            ]);
        }
        return 'completed';
    }

    public function uploadPreStudent(Request $request)
    {
        $data = request()->validate([
                'upload_file' => ['required', 'file:csv'],
                'classroom_id' => ['required', 'integer'],
        ]); 
        $extension = $request->file('upload_file')->getClientOriginalExtension();
        if ($extension == 'csv') {
            $upload = $request->file('upload_file');
            $getPath = $upload->getRealPath();

            $file = fopen($getPath, 'r');
            $headerLine = true;
            $Errors = [];

            while (($columns = fgetcsv($file, 1000, ","))!== FALSE) {
                //count columns to verify template
                $num = count($columns);
                if($num === 5)
                {
                    if($headerLine) { $headerLine = false; }                        
                    else {                        
                        if ($columns[0] == "")
                            continue;
                        $data =  $columns;
                        foreach ($data as $key => $value) {
                            $reg_no = $data[1];
                            $surname = $data[2];
                            $gender = $data[3];
                            $dob = $data[4];
                        }

                        $name = $surname;
                            if (!DB::table('students')->where('registration_id', $reg_no)->exists()) 
                            {
                                // $student_password = $this->credsService->password();
                                // $hash_student_password = bcrypt($student_password);
                                // $parent_password = $this->credsService->password();
                                //$hash_parent_password = bcrypt($parent_password);
                                $student_slug = $this->credsService->slug();
                                $result_slug = $this->credsService->slug();
                                //$parent_slug = $this->credsService->slug();

                                $student = Student::create([
                                    'date_of_birth' => $dob,
                                    'name' => $name,
                                    'gender' => $gender,
                                    'registration_id' => $reg_no,
                                    'classroom_id' => $request->classroom_id,
                                    'student_slug' => $student_slug,
                                ]);
                    
                                User::create([
                                    'student_id'=> $student->id,
                                    'password' => bcrypt('12345678')
                                ]);
    
                                $year = CalendarYear::latest('id')->first();
                                Result::create([
                                    'calendar_year_id' => $year->id,
                                    'student_id' => $student->id,
                                    'classroom_id' => $request->classroom_id,
                                    'result_slug' => $result_slug
                                ]); 
                                $success = true;                                
                            }else {
                                array_push($Errors, "Account exist for ".$name);  
                            }   
                        
                    }
                } else {
                    return response()->json(["success" => false, "error" => "Wrong template, please use the valid format."], 206);
                }
            }

            if ($Errors) {
                return response()->json(["success" => true, "error" => $Errors]);
            } elseif($success && $Errors) {
                return response()->json(["success" => true, "message" => "File uploaded successfully", "error" => $Errors]);
            } else
                return response()->json(["success" => true, "message" => "File uploaded successfully"]);
        } else {
            return response()->json(["success" => false, "error" => "file format not supported"], 415);
        }    
            
    }

    public function uploadParent(Request $request)
    {
        $data = request()->validate([
            'upload_file' => ['required', 'file:csv'],
        ]); 
        $extension = $request->file('upload_file')->getClientOriginalExtension();
        if ($extension == 'csv') {
            $upload = $request->file('upload_file');
            $getPath = $upload->getRealPath();

            $file = fopen($getPath, 'r');
            $headerLine = true;
            $Errors = [];

            while (($columns = fgetcsv($file, 1000, ","))!== FALSE) {
                //count columns to verify template
                $num = count($columns);
                if($num === 3)
                {
                    if($headerLine) { $headerLine = false; }                        
                    else {                        
                        if ($columns[0] == "")
                            continue;
                        $data =  $columns;
                        foreach ($data as $key => $value) {
                            $registration_id = $data[0];
                            $phone1 = $data[1];
                            $phone2 = $data[2];
                        }

                        $student = Student::where('registration_id', $registration_id)->first();
                        if(!$student)
                        {
                            array_push($Errors, "Account does not exist for ".$registration_id);  
                        } else {
                            $surname = explode(' ', $student->name);
                            $surname = $surname[0];

                            if($phone1 == '')
                            {
                                $phone = rand(10,100).now();
                            }else {
                                $phone = $phone1;
                            }

                            $guardian = Guardian::where('username', $phone)->first();
                           // return $guardian ?? false;
                            if(!$guardian)
                            {
                                $guardian = Guardian::create([
                                    'name' => $surname,
                                    'username' => $phone,
                                    'phone' => $phone,
                                    'password' => bcrypt('12345678'),
                                    'guardian_slug' => Str::slug($surname).now(),
                                ]);
                            } 
                            GuardianWard::updateOrCreate([
                                'student_id' => $student->id,
                                'guardian_id' => $guardian->id
                            ]);

                            $success = true;
                        }
                    }
                } else {
                    return response()->json(["success" => false, "error" => "Wrong template, please use the valid format."], 206);
                }
            }

            if ($Errors) {
                return response()->json(["success" => true, "error" => $Errors]);
            } elseif($success && $Errors) {
                return response()->json(["success" => true, "message" => "File uploaded successfully", "error" => $Errors]);
            } else
                return response()->json(["success" => true, "message" => "File uploaded successfully"]);
        } else {
            return response()->json(["success" => false, "error" => "file format not supported"], 415);
        }    
            
    }

    // public function uploadAdmin(Request $request)
    // {
    //     $data = request()->validate([
    //         'upload_file' => ['required', 'file:csv'],
    //     ]); 

    //     $upload = $request->file('upload_file');
    //     $getPath = $upload->getRealPath();

    //     $file = fopen($getPath, 'r');
    //     $headerLine = true;
    //     $Errors = [];
    //     while (($columns = fgetcsv($file, 1000, ","))!== FALSE) {
    //         $num = count($columns);  
    //         if($num === 2)
    //             {
    //                 if($headerLine) { $headerLine = false; }
    //                 else {
    //                     if ($columns[0] == "")
    //                         continue;
    //                     $data =  $columns;
    //                     foreach ($data as $key => $value) {
    //                         $name = $data[0];
    //                         $phone = $data[1];
    //                     }

    //                     if(!DB::table('employees')->wherePhone($phone)->exists())
    //                     {

    //                     } else {
    //                         $username = $this->credsService->username($name);
    //                         //$password = $this->credsService->password();
    //                         $hash = bcrypt('12345678');
    //                         $slug = $this->credsService->slug();
    //                         $employee = Employee::create([
    //                             'name' => $name,
    //                             'phone_number' => $phone,
    //                             'employee_slug' => $slug,
    //                         ]);

    //                         Teacher::create([
    //                             'employee_id' => $employee->id,
    //                             'username' => $username,
    //                             'password' => $hash,
    //                         ]);
                            
    //                         $success = true;
    //                     }
    //                 }
    //             } else {
    //                 //return redirect()->back()->with('error', 'Data created successfully.');
    //                 return response()->json(["success" => false, "error" => "Wrong template, please use the correct one."], 206);
    //             }

    //     }

    //     if ($Errors) {
    //         //return redirect()->back()->with('error', $Errors);
    //         return response()->json(["success" => true, "error" => $Errors]);
    //     } elseif($success && $Errors) {
    //        // return redirect()->back()->with('success', 'Data created successfully. But with ' .$Errors);
    //         return response()->json(["success" => true, "message" => "File uploaded successfully", "error" => $Errors]);
    //     } else{
    //        // return redirect()->back()->with('success', 'Data created successfully.');
    //         return response()->json(["success" => true, "message" => "File uploaded successfully"]);
    //     }
                
            
    // }
    

    // public function edit(Employee $employee)
    // {
    //     $classrooms = Classroom::get();
    //     return view('administrator.employee.edit', [
    //         'employee' => $employee,
    //         'classrooms' => $classrooms
    //     ]);  
    // }

    // public function update(Request $request, $id)
    // {
    //     $data = request()->validate([
    //         'title' => ['required', 'string'],
    //         'name' => ['required', 'string'],
    //         'role_id' => ['required', 'integer'],
    //         'classroom_id' => ['nullable', 'unique:employees'],
    //         'subject_id' => ['nullable'],
    //     ]); 

    //     if(!Subject::whereId($request->subject_id)->whereNull('employee_id')->exists())
    //     {
    //         return redirect()->back()->with('error', 'Subject is not available.')->withInput($request->all());
    //     }

    //     //Handle file upload
    //     $response = '';
    //     if($request->hasFile('employee_image')){
    //         // Store the image on Cloudinary and return the secure URL
    //         $response = $request->file('employee_image')->storeOnCloudinary()->getSecurePath();
    //     }


    //     Employee::whereId($id)->update([
    //         'title' => $request->title,
    //         'name' => $request->name,
    //         //'email' => $request->email'),
    //         'role_id' => $request->role_id,
    //         'classroom_id' => $request->classroom_id,
    //         //'subject_id' => $request->subject_id, update subject id if isset
    //         'employee_image' => $response
    //     ]);
        

    //     return redirect()->back()->with('success', 'Data saved successfully.');  
    // }

    public function check()
    {
        $result_t = ResultDetail::whereResultId(8)->get();
        $sum = $result_t->sum('total');

        return $sum;
        $classroom_id = 3;
        $subject_id = 8;
        // $x = DB::table('results')
        // ->select('results.student_id')
        // ->join('result_details', 'results.id', '=', 'result_details.result_id')
        // ->where('result_details.subject_id', '=', $subject_id)
        // ->where('results.classroom_id', '=', $classroom_id)
        // ->groupBy('results.student_id')
        // ->get();

        // $x = DB::table('results')
        // ->select('result_details.result_id', 'result_details.total', 'results.student_id', DB::raw(' (order by sum(result_details.total) desc) as position'))
        // ->join('result_details', 'results.id', '=', 'result_details.result_id')
        // ->where('result_details.subject_id', '=', $subject_id)
        // ->where('results.classroom_id', '=', $classroom_id)
        // ->groupBy('results.student_id')
        // ->orderBy('position')
        // ->get();
        // $universities = DB::table('applications')->select('university', DB::raw("COUNT('applications.id') as number_of_applications"))->whereProjectId($project_id)->orderBy('number_of_applications', 'desc')->groupBy('university')->take(10)->get();
        // DB::raw('(SELECT COUNT(*) FROM results WHERE total > t.total) as position'

        $x = DB::table('results')
        ->join('result_details', 'results.id', '=', 'result_details.result_id')
        ->select('result_details.id', 'result_details.total', 'results.student_id', DB::raw('@row_number:=@row_number+1 as position'))
        ->crossJoin(DB::raw('(SELECT @row_number:=0) as init'))
        ->where('result_details.subject_id', $subject_id)
        ->where('results.classroom_id', $classroom_id)
        ->groupBy('result_details.id', 'results.student_id')
        ->orderBy(DB::raw('result_details.total'), 'desc')
        ->get();

        // $x = DB::table('results')
        // ->join('result_details', 'results.id', '=', 'result_details.result_id')
        // ->select('result_details.id', 'result_details.total', 'results.student_id', DB::raw('@row_number:=@row_number+1 as position'))
        // ->crossJoin(DB::raw('(SELECT @row_number:=0) as init'))
        // ->where('result_details.subject_id', $subject_id)
        // ->where('results.classroom_id', $classroom_id)
        // ->groupBy('result_details.id', 'results.student_id')
        // ->orderBy('position', 'desc')
        // ->get();
        return $x;
        foreach ($x as $student) {
            DB::table('result_details')
              ->where('result_id', $student->result_id)
              ->update(['position' => $student->position]);
        }

        // $updates = [];
        // foreach ($x as $student) {
        // $updates[] = [
        //     'student_id' => $student->student_id,
        //     'subject_id' => $subject_id,
        //     'classroom_id' => $classroom_id,
        //     'position' => $student->position,
        // ];
        // }

        // DB::table('result_details')
        // ->updateBatch($updates, 'student_id', 'subject_id', 'classroom_id');

        // $student = $x->where('student_id', 62)->first();
         return $x;
    }

    public function uploadResult(Request $request)
    // {
    //     // $Errors = [];
    //     // array_push($Errors, "100 not found");
    //     // return redirect()->back()->with(['success', 'Data uploaded successfully. But with '.$Errors]);
    //     $data = request()->validate([
    //         'subject_id' => ['required', 'integer'],
    //         'classroom_id' => ['required', 'integer'],
    //         'upload_file' => ['required'],
    //     ]); 

    //     $extension = $request->file('upload_file')->getClientOriginalExtension();
    //     if ($extension == 'csv') {
    //         $upload = $request->file('upload_file');
    //         $subject_id = $request->subject_id;
    //         $classroom_id= $request->classroom_id;
    //         $getPath = $upload->getRealPath();

    //         $file = fopen($getPath, 'r');
    //         $headerLine = true;
    //         $Errors = [];
    //         while (($columns = fgetcsv($file, 1000, ","))!== FALSE) {
    //             $num = count($columns);  
    //             //$status = DB::table('results')->join('result_details', 'results.id', '=', 'result_details.result_id')->where('classroom_id', $classroom_id)->where('subject_id')::whereStudentId($student->id)->latest()->first();
    //             if($num === 10)
    //             {
    //                 if($headerLine) { $headerLine = false; }
                    
    //                 else {
                    
    //                     if ($columns[0] == "")
    //                         continue;
    //                     $data =  $columns;
    //                     foreach ($data as $key => $value) {
    //                         $reg_id = $data[1];
    //                         $project = $data[3];
    //                         $assignment = $data[4];
    //                         $assessment = $data[5];
    //                         $exam = $data[6];
    //                         $total = $data[7];
    //                     }

    //                     $student = Student::whereRegistrationId($reg_id)->whereClassroomId($classroom_id)->first();
    //                     if ($student) {
    //                         switch ($total) {
    //                             case $total >= 70:
    //                                 $grade = 'A';
    //                                 $comment = 'Distinction';
    //                             break;
    //                             case $total >= 60 and $total <= 69:
    //                                 $grade = 'B';
    //                                 $comment = 'Merit';
    //                             break;
    //                             case $total >= 45 and $total <= 59:
    //                                 $grade = 'C';
    //                                 $comment = 'Merit';
    //                             break;
    //                             case $total >= 35 and $total <= 44:
    //                                 $grade = 'D';
    //                                 $comment = 'Pass';
    //                             break;
    //                             case $total <= 34:
    //                                 $grade = 'F';
    //                                 $comment = 'Fail';
    //                             break;
    //                             default:
    //                                 $grade = 'F';
    //                                 $comment = 'Fail';
    //                             break;
    //                             }  
    //                         $result = Result::whereStudentId($student->id)->latest()->first();
                            

    //                         if(ResultDetail::whereResultId($result->id)->whereSubjectId($subject_id)->doesntExist())
    //                         {
    //                             ResultDetail::updateOrCreate([
    //                                 'result_id' => $result->id,
    //                                 'subject_id' => $subject_id, 
    //                                 'project' => $project,
    //                                 'assignment' => $assignment,
    //                                 'assessment' => $assessment,
    //                                 'exam' => $exam,
    //                                 'total' => $total,
    //                                 'grade' => $grade,
    //                                 'comment' => $comment,
    //                             ]);
                            
    //                             $x = DB::table('results')
    //                                 ->select('result_details.result_id', 'results.student_id', DB::raw('rank() over (order by sum(result_details.total) desc) as position'))
    //                                 ->join('result_details', 'results.id', '=', 'result_details.result_id')
    //                                 ->where('result_details.subject_id', '=', $subject_id)
    //                                 ->where('results.classroom_id', '=', $classroom_id)
    //                                 ->groupBy('results.student_id')
    //                                 ->orderBy('position')
    //                                 ->get();
                                
    //                             foreach ($x as $student) {
    //                                 DB::table('result_details')
    //                                   ->where('result_id', $student->result_id)
    //                                   ->update(['position' => $student->position]);
    //                             }

    //                             $result_t = ResultDetail::whereResultId($result->id)->get();
    //                             $sum = $result_t->sum('total');
    //                             $count = $result_t->count();
    //                             $mks_obtained = $result->mks_obtained + $sum;

    //                             Result::whereId($result->id)->update([
    //                                 'mks_obtained' => $mks_obtained
    //                             ]);
    //                             $success = true;
    //                         } else{
    //                             array_push($Errors, $reg_id." result already uploaded");
    //                         }
    //                     }else {
    //                         array_push($Errors, $reg_id." not found");
    //                     }
    //                 }
    //             } else {
    //                 return response()->json(["success" => false, "error" => "Wrong template, please use the valid format."], 206);
    //             }
    //         }

    //         if ($Errors) {
    //             return response()->json(["success" => true, "error" => $Errors]);
    //         } elseif($success && $Errors) {
    //             return response()->json(["success" => true, "message" => "File uploaded successfully", "error" => $Errors]);
    //         } else{
    //             return response()->json(["success" => true, "message" => "File uploaded successfully"]);
    //         }
        
    //     } else {
    //         return response()->json(["success" => false, "error" => "Wrong template, please use the valid format."], 206);
    //     }
    // }
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
                            switch ($total) {
                                case $total >= 90:
                                    $grade = 'A+';
                                    $comment = 'Outstanding';
                                break;
                                case $total >= 80 and $total <= 89:
                                    $grade = 'A';
                                    $comment = 'Excellent';
                                break;
                                case $total >= 70 and $total <= 79:
                                    $grade = 'B';
                                    $comment = 'Very Good';
                                break;
                                case $total >= 60 and $total <= 69:
                                    $grade = 'C';
                                    $comment = 'Good';
                                break;
                                case $total >= 50 and $total <= 59:
                                    $grade = 'D';
                                    $comment = 'Pass';
                                break;
                                case $total >= 40 and $total <= 49:
                                    $grade = 'E';
                                    $comment = 'Fair';
                                break;
                                default:
                                    $grade = 'F';
                                    $comment = 'Fail';
                                break;
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
                            
          
        //                $x = DB::table('results')
        // ->join('result_details', 'results.id', '=', 'result_details.result_id')
        // ->select('result_details.id', 'result_details.total', 'results.student_id', DB::raw('@row_number:=@row_number+1 as position'))
        // ->crossJoin(DB::raw('(SELECT @row_number:=0) as init'))
        // ->where('result_details.subject_id', $subject_id)
        // ->where('results.classroom_id', $classroom_id)
        // ->groupBy('result_details.id', 'results.student_id')
        // ->orderBy(DB::raw('result_details.total'), 'desc')
        // ->get();         
                                
        //                         foreach ($x as $student) {
        //                             DB::table('result_details')
        //                               ->where('result_id', $student->id)
        //                               ->update(['position' => $student->position]);
        //                         }

                                $result_t = ResultDetail::select('total')->whereResultId($result->id)->whereSubjectId($subject_id)->first();
                                
                                $mks_obtained = $result->mks_obtained + $result_t->total;

                                Result::whereId($result->id)->update([
                                    'mks_obtained' => $mks_obtained
                                ]);

                            Log::info('result', [$result_t/*->id, $sum, $mks_obtained*/]);
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
                return response()->json(["success" => true, "error" => $errors]);
                
            } elseif($success && $errors) {
                return response()->json(["success" => true, "message" => "File uploaded successfully", "error" => $errors]);
            } else{
                return response()->json(["success" => true, "message" => "File uploaded successfully"]);
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
}
