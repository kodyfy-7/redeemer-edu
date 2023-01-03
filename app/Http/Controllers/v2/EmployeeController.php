<?php

namespace App\Http\Controllers\v2;

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
    User,
};
use App\Services\CredsService;
use Exception;

class EmployeeController extends Controller
{
    public function __construct(CredsService $credsService)
    {
        $this->middleware('auth');
        $this->credsService = $credsService;
    }

    public function index()
    {
        $employees = Employee::get();
        return view('panel.employee.index', [
            'employees' => $employees
        ]);
    }

    public function create()
    {
        $employee = new Employee;
        $classrooms = Classroom::get();
        $roles = Role::get();
        return view('panel.employee.create', [
            'employee' => $employee,
            'classrooms' => $classrooms,
            'roles' => $roles
        ]);
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'name' => ['required', 'string'],
            'phone_number' => ['required', 'unique:employees'],
            'role_id' => ['required', 'integer'],
            'classroom_id' => ['nullable', 'unique:employees'],
        ]); 

        $name = $request->name;
        $username = $this->credsService->username($name);
        $password = $this->credsService->password();
        $hash = bcrypt($password);
        $slug = $this->credsService->slug();

        try {
            //Handle file upload
            $response = '';
            // if($request->hasFile('employee_image')){
            //     // Store the image on Cloudinary and return the secure URL
            //     $response = $request->file('employee_image')->storeOnCloudinary()->getSecurePath();
            // }

            $user = User::create([
                'username' => $username,
                'password' => $password,
                'login_status' => 'active',
                'role_id' => $request->role_id,
            ]);

            $employee = Employee::create([
                'user_id' => $user->id,
                'title' => $request->title,
                'name' => $request->name,
                'role_id' => $request->role_id,
                'classroom_id' => $request->classroom_id,
                'employee_image' => $response,
                'phone_number' => $request->phone_number,
                'employee_slug' => $slug,
            ]);           

            //Send credentials to email address
            
            return redirect()->back()->with('success', 'Data created successfully.');


        } catch(Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function show(Employee $employee)
    {
        return view('panel.employee.show', [
            'employee' => $employee
        ]);
    }

    public function edit(Employee $employee)
    {
        $classrooms = Classroom::get();
        $roles = Role::get();
        return view('panel.employee.edit', [
            'employee' => $employee,
            'classrooms' => $classrooms,
            'roles' => $roles
        ]);  
    }

    public function update(Request $request, $id)
    {
        $data = request()->validate([
            'name' => ['required', 'string'],
            'role_id' => ['required', 'integer'],
            'classroom_id' => ['nullable', 'unique:employees'],
        ]); 

        //Handle file upload
        $response = '';
        // if($request->hasFile('employee_image')){
        //     // Store the image on Cloudinary and return the secure URL
        //     $response = $request->file('employee_image')->storeOnCloudinary()->getSecurePath();
        // }


        Employee::whereId($id)->update([
            'title' => $request->title,
            'name' => $request->name,
            'role_id' => $request->role_id,
            'classroom_id' => $request->classroom_id,
            'employee_image' => $response
        ]);
        
        return redirect()->back()->with('success', 'Data saved successfully.');  
    }
}
