<?php

namespace App\Http\Controllers\Users\Administrator;

use App\Http\Controllers\Controller;
use App\Imports\StudentsImport;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
  
use App\Models\{
    CalendarYear,
    Classroom,
    Guardian,
    GuardianWard,
    Result,
    Student,
    StudentAttendance,
    User,
};
use App\Services\CredsService;
use App\Services\RegistrationService;
use App\Services\YearService;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StudentController extends Controller
{
    public function __construct(CredsService $credsService, RegistrationService $registrationService, YearService $yearService)
    {
        $this->middleware('auth:administrator');
        $this->credsService = $credsService;
        $this->registrationService = $registrationService;
        $this->yearService = $yearService;
    }

    public function index()
    {
        $students = Student::get();
        return view('administrator.student.index', [
            'students' => $students
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
        // $users = User::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
        //             ->whereYear('created_at', date('Y'))
        //             ->groupBy(DB::raw("Month(created_at)"))
        //             ->pluck('count', 'month_name');
 
        // $labels = $users->keys();
        // $data = $users->values();
        return view('administrator.student.show', [
            'student' => $student,
            'attendance' => $attendance,
            'results' => $results,
            //'labels' => $labels,
            //'data' => $data

        ]);
    }

    public function create()
    {
        $student = new Student;
        $classrooms = Classroom::all();
        return view('administrator.student.create', [
            'student' => $student,
            'classrooms' => $classrooms
        ]);
    }

    public function store(Request $request)
    {  
        
        $data = request()->validate([
            'name' => ['required', 'string'],
            'gender' => ['required', 'string'],
            'date_of_birth' => ['required', 'string'],
            'parent_name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:guardians'],
            'phone' => ['required', 'unique:guardians'],
            'classroom_id' => ['required', 'integer'],
        ]); 

        // return 1;

        //check if student exist already
        if(Student::whereName($request->name)->whereDateOfBirth($request->date_of_birth)->exists())
        {
            return redirect()->back()->with('error', 'Student already exist.')->withInput($request->all());
        }

        $name = $request->name;
        $parent_name = $request->parent_name;

        //$student_username = $this->credsService->username($name);
        $parent_username = $this->credsService->username($parent_name);
        $student_password = $this->credsService->password();
        $hash_student_password = bcrypt($student_password);
        $parent_password = $this->credsService->password();
        $hash_parent_password = bcrypt($parent_password);
        $student_slug = $this->credsService->slug();
        $result_slug = $this->credsService->slug();
        $parent_slug = $this->credsService->slug();
        $reg_number = $this->registrationService->regNumber();

        try {
            //     //Handle file upload
            //     $response = '';
            //     if($request->hasFile('employee_image')){
            //         // Store the image on Cloudinary and return the secure URL
            //         $response = $request->file('employee_image')->storeOnCloudinary()->getSecurePath();
            //     }
                //return $request->reg_number;
            $student = Student::create([
                'date_of_birth' => $request->date_of_birth,
                'name' => $request->name,
                'gender' => $request->gender,
                'classroom_id' => $request->classroom_id,
                'student_image' => 1,
                'student_slug' => $student_slug,
                'registration_id' => $reg_number,
            ]);

            User::create([
                'student_id'=> $student->id,
                'password' => $hash_student_password
            ]);

            $year = CalendarYear::latest('id')->first();
            Result::create([
                'calendar_year_id' => $year->id,
                'student_id' => $student->id,
                'classroom_id' => $request->classroom_id,
                'result_slug' => $result_slug
            ]); 

            $guardian = Guardian::create([
                'name' => $request->parent_name,
                'email' => $request->email,
                'username' => $parent_username,
                'password' => $hash_parent_password,
                //'subject_id' => $request->subject_id, update subject id if isset
                //'employee_image' => $response,
                'phone' => $request->phone,
                'guardian_slug' => $parent_slug,
            ]);

            GuardianWard::create([
                'student_id' => $student->id,
                'guardian_id' => $guardian->id
            ]);

            //Send credentials to email address
                
            return redirect()->back()->with('success', 'Data created successfully.');


        } catch(Exception $e)
        {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function uploadx(Request $request)
    {
        $data = request()->validate([
            'classroom_id' => ['required', 'integer'],
            'upload_file' => ['required', 'file:csv'],
        ]); 

        Excel::import(new StudentsImport($request->classroom_id),request()->file('upload_file'));
    }

    public function upload(Request $request)
    {
        $data = request()->validate([
            'classroom_id' => ['required', 'integer'],
            'upload_file' => ['required', 'file:csv'],
        ]); 

        $upload = $request->file('upload_file');
        $getPath = $upload->getRealPath();

        $file = fopen($getPath, 'r');
        $headerLine = true;
        $Errors = [];
        while (($columns = fgetcsv($file, 1000, ","))!== FALSE) {
            $num = count($columns);  
            if($num === 3)
                {
                    if($headerLine) { $headerLine = false; }
                    else {
                        if ($columns[0] == "")
                            continue;
                        $data =  $columns;
                        foreach ($data as $key => $value) {
                            $name = $data[0];
                            $gender = $data[1];
                            $date_of_birth= $data[2];
                        }

                        if(!Student::whereName($request->name)->whereDateOfBirth($request->date_of_birth)->exists())
                        {
                            // $parent_username = $this->credsService->username($parent_name);
                            $student_password = $this->credsService->password();
                            $hash_student_password = bcrypt($student_password);
                            $parent_password = $this->credsService->password();
                            $hash_parent_password = bcrypt($parent_password);
                            $student_slug = $this->credsService->slug();
                            $result_slug = $this->credsService->slug();
                            $parent_slug = $this->credsService->slug();
                            $reg_number = $this->registrationService->regNumber();

                            $student = Student::create([
                                'date_of_birth' => $date_of_birth,
                                'registration_id' => $reg_number,
                                'name' => $name,
                                'gender' => $gender,
                                'classroom_id' => $request->classroom_id,
                                'student_image' => 1,
                                'student_slug' => $student_slug,
                            ]);
                
                            User::create([
                                'student_id'=> $student->id,
                                'password' => $hash_student_password
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
                            array_push($Errors, $request->name." with " .$request->date_of_birth. " already exists");
                        }
                    }
                } else {
                    return redirect()->back()->with('error', 'Data created successfully.');
                    //return response()->json(["success" => false, "error" => "Wrong template, please use the correct one."], 206);
                }

        }

        if ($Errors) {
            return redirect()->back()->with('error', $Errors);
            //return response()->json(["success" => true, "error" => $Errors]);
        } elseif($success && $Errors) {
            return redirect()->back()->with('success', 'Data created successfully. But with ' .$Errors);
            //return response()->json(["success" => true, "message" => "File uploaded successfully", "error" => $Errors]);
        } else{
            return redirect()->back()->with('success', 'Data created successfully.');
            //return response()->json(["success" => true, "message" => "File uploaded successfully"]);
        }
                
            
    }
    

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
}
