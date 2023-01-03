<?php

namespace App\Http\Controllers\v2;

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
        $this->middleware('auth');
        $this->credsService = $credsService;
    }

    public function index()
    {
        $subjects = Subject::groupBy('subject_title')->get();
        return view('panel.subject.index', [
            'subjects' => $subjects
        ]);
    }

    public function create()
    {
        $subject = new subject;
        $categories = ClassroomCategory::get();
        return view('panel.subject.create', [
            'subject' => $subject,
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'subject_title' => ['required'],
        ]); 
    
        $slug = $this->credsService->slug();

        try {
            Subject::create([
                // 'classroom_category_id' => $request->classroom_category_id,
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
        return view('panel.subject.edit', [
            'subject' => $subject,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = request()->validate([
            'subject_title' => ['required'],
        ]); 
        
        Subject::whereId($id)->update([
            'subject_title' => $request->subject_title,
        ]);

        return redirect()->back()->with('success', 'Data saved successfully.');  
    }
}
