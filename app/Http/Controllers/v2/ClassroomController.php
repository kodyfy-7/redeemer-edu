<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 
use App\Models\{
    Administrator,
    Classroom,
    ClassroomCategory,
    Employee,
    Student,
    Subject,
    Teacher,
};
use App\Services\CredsService;
use Exception;

class ClassroomController extends Controller
{
    public function __construct(CredsService $credsService)
    {
        $this->middleware('auth');
        $this->credsService = $credsService;
    }

    public function index()
    {
        $classrooms = Classroom::orderBy('classroom_name')->get();
        return view('panel.classroom.index', [
            'classrooms' => $classrooms
        ]);
    }

    public function create()
    {
        $classroom = new Classroom;
        $categories = ClassroomCategory::get();
        return view('panel.classroom.create', [
            'classroom' => $classroom,
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {        
        $data = request()->validate([
            'classroom_category_id' => ['required'],
            'classroom_name' => ['required'],
            'classroom_section' => ['required'],
            'classroom_code' => ['required', 'unique:classrooms'],
        ]); 

        
        $slug = $this->credsService->slug();

        try {
            Classroom::create([
                'classroom_category_id' => $request->classroom_category_id,
                'classroom_name' => $request->classroom_name,
                'classroom_section' => $request->classroom_section,
                'classroom_code' => $request->classroom_code,
                'classroom_slug' => $slug,
            ]);

            return redirect()->back()->with('success', 'Data created successfully.');


        } catch(Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function show(Classroom $classroom)
    {
        $students = Student::whereClassroomId($classroom->id)->orderBy('name', 'asc')->get();

        $gender_count = Student::selectRaw('COUNT(CASE gender WHEN "male" THEN 1 ELSE NULL END) as "male", COUNT(CASE gender WHEN "female" THEN 1 ELSE NULL END) as "female", COUNT(*) as "all" ')->whereClassroomId($classroom->id)->first();

        //$employees = Employee::where('role_id', 2)->whereNull('classroom_id')->get();
        return view('panel.classroom.show', [
            'classroom' => $classroom,
            'students' => $students,
            'gender_count' => $gender_count,
            //'employees' => $employees
        ]);
    }

    public function edit(Classroom $classroom)
    {
        //$classroom = new Classroom;
        $categories = ClassroomCategory::get();
        return view('panel.classroom.edit', [
            'classroom' => $classroom,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = request()->validate([
            'classroom_category_id' => ['required', 'integer'],
            'classroom_name' => ['required', 'string'],
            'classroom_code' => ['required', 'string'],
            'classroom_section' => ['required', 'string']
        ]); 

        Classroom::whereId($id)->update([
            'classroom_category_id' => $request->classroom_category_id,
            'classroom_name' => $request->classroom_name,
            'classroom_code' => $request->classroom_code,
            'classroom_section' => $request->classroom_section,
        ]);
        
        return redirect()->route('panel.classrooms.index')->with('success', 'Data saved successfully.');  
    }

    public function updateTeacher(Request $request)
    {
        $data = request()->validate([
            'employee_id' => ['required', 'integer']
        ]); 

        Employee::whereId($data['employee_id'])->update([
            'classroom_id' => $request->classroom_id,
        ]);
        
        return redirect()->route('panel.classrooms.show', $request->slug)->with('success', 'Data saved successfully.');
    }
}
