<?php

namespace App\Http\Controllers\Users\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
 
use App\Models\{
    Administrator,
    Classroom,
    Employee,
    Subject,
    Teacher,
    Role,
};
use App\Services\CredsService;
use Exception;

class EmployeeController extends Controller
{
    public function __construct(CredsService $credsService)
    {
        $this->middleware('auth:administrator');
        $this->credsService = $credsService;
    }

    public function index()
    {
        $employees = Employee::get();
        return view('administrator.employee.index', [
            'employees' => $employees
        ]);
    }

    public function create()
    {
        $employee = new Employee;
        $classrooms = Classroom::get();
        $roles = Role::get();
        return view('administrator.employee.create', [
            'employee' => $employee,
            'classrooms' => $classrooms,
            'roles' => $roles
        ]);
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'title' => ['required', 'string'],
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:employees'],
            'phone_number' => ['required', 'unique:employees'],
            'role_id' => ['required', 'integer'],
            'classroom_id' => ['nullable', 'unique:employees'],
        ]); 


        if(Subject::whereId($request->subject_id)->whereNotNull('employee_id')->exists())
        {
            return redirect()->back()->with('error', 'Subject is not available.')->withInput($request->all());
        }


        $name = $request->name;

        $username = $this->credsService->username($name);
        $password = $this->credsService->password();
        $hash = bcrypt($password);
        $slug = $this->credsService->slug();

        try {
            //Handle file upload
            $response = '';
            if($request->hasFile('employee_image')){
                // Store the image on Cloudinary and return the secure URL
                $response = $request->file('employee_image')->storeOnCloudinary()->getSecurePath();
            }

            $employee = Employee::create([
                'title' => $request->title,
                'name' => $request->name,
                'email' => $request->email,
                'role_id' => $request->role_id,
                'classroom_id' => $request->classroom_id,
                //'subject_id' => $request->subject_id, update subject id if isset
                'employee_image' => $response,
                'phone_number' => $request->phone_number,
                'employee_slug' => $slug,
            ]);

            if($request->role_id == 1)
            {
                //$model = 'Administrator';
                Administrator::create([
                    'employee_id' => $employee->id,
                    'username' => $username,
                    'password' => $hash,
                ]);
            } else {
                //$model = 'Teacher';
                Teacher::create([
                    'employee_id' => $employee->id,
                    'username' => $username,
                    'password' => $hash,
                ]);
                //Subject::whereId($request->id)->update(['employee_id' => $employee->id]);
            }

            

            //Send credentials to email address
            
            return redirect()->back()->with('success', 'Data created successfully.');


        } catch(Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function show(Employee $employee)
    {
        return view('administrator.employee.show', [
            'employee' => $employee
        ]);
    }

    public function edit(Employee $employee)
    {
        $classrooms = Classroom::get();
        $roles = Role::get();
        return view('administrator.employee.edit', [
            'employee' => $employee,
            'classrooms' => $classrooms,
            'roles' => $roles
        ]);  
    }

    public function update(Request $request, $id)
    {
        $data = request()->validate([
            'title' => ['required', 'string'],
            'name' => ['required', 'string'],
            'role_id' => ['required', 'integer'],
            'classroom_id' => ['nullable', 'unique:employees'],
            // 'subject_id' => ['nullable'],
        ]); 

        //Handle file upload
        $response = '';
        if($request->hasFile('employee_image')){
            // Store the image on Cloudinary and return the secure URL
            $response = $request->file('employee_image')->storeOnCloudinary()->getSecurePath();
        }


        Employee::whereId($id)->update([
            'title' => $request->title,
            'name' => $request->name,
            //'email' => $request->email'),
            'role_id' => $request->role_id,
            'classroom_id' => $request->classroom_id,
            //'subject_id' => $request->subject_id, update subject id if isset
            'employee_image' => $response
        ]);
        
        return redirect()->back()->with('success', 'Data saved successfully.');  
    }
}
