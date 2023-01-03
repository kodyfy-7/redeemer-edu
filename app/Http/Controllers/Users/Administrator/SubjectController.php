<?php

namespace App\Http\Controllers\Users\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
 
use App\Models\{
    Administrator,
    Classroom,
    ClassroomCategory,
    Employee,
    Subject,
    Teacher,
    Role,
};
use App\Services\CredsService;
use Exception;

class SubjectController extends Controller
{
    public function __construct(CredsService $credsService)
    {
        $this->middleware('auth:administrator');
        $this->credsService = $credsService;
    }

    public function index()
    {
        $subjects = Subject::get();
        return view('administrator.subject.index', [
            'subjects' => $subjects
        ]);
    }

    public function create()
    {
        $subject = new subject;
        $categories = ClassroomCategory::get();
        return view('administrator.subject.create', [
            'subject' => $subject,
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'classroom_category_id' => ['required'],
            'subject_title' => ['required'],
        ]); 
    
        $slug = $this->credsService->slug();

        try {
            Subject::create([
                'classroom_category_id' => $request->classroom_category_id,
                'subject_title' => $request->subject_title,
                'subject_slug' => $slug,
            ]);

            return redirect()->back()->with('success', 'Data created successfully.');
        } catch(Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit(Subject $subject)
    { 
        //$classroom = new Classroom;
        $categories = ClassroomCategory::get();
        return view('administrator.subject.edit', [
            'subject' => $subject,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = request()->validate([
            'classroom_category_id' => ['required'],
            'subject_title' => ['required'],
        ]); 
        
        Subject::whereId($id)->update([
            'classroom_category_id' => $request->classroom_category_id,
            'subject_title' => $request->subject_title,
        ]);

        return redirect()->back()->with('success', 'Data saved successfully.');  
    }
}
