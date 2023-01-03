use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;

class ResultController extends Controller
{
    public function index()
    {
        $classrooms = Classroom::get();
        $subjects = Subject::get();
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

        $subject_id = $request->subject_id;
        $classroom_id= $request->classroom_id;

        try {
            $import = new StudentsImport($subject_id, $classroom_id);
            Excel::import($import, request()->file('upload_file'));
            return redirect()->back()->with('success', 'Data uploaded successfully.');
        } catch (Exception $e) {
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }
}
