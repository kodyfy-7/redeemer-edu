use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Student;
use App\Models\Result;
use App\Models\ResultDetail;

class StudentsImport implements WithHeadingRow, ToModel
{
    protected $subject_id;
    protected $classroom_id;

    public function __construct($subject_id, $classroom_id)
    {
        $this->subject_id = $subject_id;
        $this->classroom_id = $classroom_id;
    }

    public function model(array $row)
    {
        $reg_id = $row['registration_id'];
        $project = $row['project'];
        $assignment = $row['assignment'];
        $assessment = $row['assessment'];
        $exam = $row['exam'];
        $total = $row['total'];

        $student = Student::whereRegistrationId($reg_id)->whereClassroomId($this->classroom_id)->first();
        if ($student) {
            switch ($total) {
                case $total >= 70:
                    $grade = 'A';
                break;
                case $total >= 60 and $total <= 69:
                    $grade = 'B';
                break;
                case $total >= 45 and $total <= 59:
                    $grade = 'C';
                break;
                case $total >= 35 and $total <= 44:
                    $grade = 'D';
                break;
                default:
                    $grade = 'F';
                break;
            }  
            $result = Result::whereStudentId($student->id)->latest()->first();

            if(ResultDetail::whereResultId($result->id)->whereSubjectId($this->subject_id)->doesntExist())
            {
                ResultDetail::create([
                    'result_id' => $result->id,
                    'subject_id' => $this->subject_id,
                    'project' => $project,
                    'assignment' => $assignment,
                    'assessment' => $assessment,
                    'exam' => $exam,
                    'total' => $total,
                    'grade' => $grade,
                ]);
            }
            else {
                $result_detail = ResultDetail::whereResultId($result->id)->whereSubjectId($this->subject_id)->first();
                $result_detail->update([
                    'project' => $project,
                    'assignment' => $assignment,
                    'assessment' => $assessment,
                    'exam' => $exam,
                    'total' => $total,
                    'grade' => $grade,
                ]);
            }
        }
    }
}
