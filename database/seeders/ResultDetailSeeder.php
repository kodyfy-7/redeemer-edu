<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ResultDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        \App\Models\ResultDetail::create([
            'result_id' => 4,
            'subject_id' => 1,
            'project' => 9, 
            'assignment' => 6,
            'assessment' => 12,
            'exam' => 36,
            'total' => 89,
            'grade' => 'A',
        ]);

        \App\Models\ResultDetail::create([
            'result_id' => 4,
            'subject_id' => '2',
            'project' => 20, 
            'assignment' => 60,
            'assessment' => 12,
            'exam' => 40,
            'total' => 89,
            'grade' => 'A',
        ]);

        \App\Models\ResultDetail::create([
            'result_id' => 4,
            'subject_id' => '3',
            'project' => 20, 
            'assignment' => 60,
            'assessment' => 12,
            'exam' => 40,
            'total' => 78,
            'grade' => 'A',
        ]);

        \App\Models\ResultDetail::create([
            'result_id' => 4,
            'subject_id' => '4',
            'project' => 20, 
            'assignment' => 60,
            'assessment' => 12,
            'exam' => 40,
            'total' => 76,
            'grade' => 'A',
        ]);

        \App\Models\ResultDetail::create([
            'result_id' => 4,
            'subject_id' => '5',
            'project' => 20, 
            'assignment' => 60,
            'assessment' => 12,
            'exam' => 40,
            'total' => 56,
            'grade' => 'C',
        ]);

        \App\Models\ResultDetail::create([
            'result_id' => 4,
            'subject_id' => '6',
            'project' => 20, 
            'assignment' => 60,
            'assessment' => 12,
            'exam' => 40,
            'total' => 66,
            'grade' => 'B',
        ]);

        \App\Models\ResultDetail::create([
            'result_id' => 4,
            'subject_id' => '7',
            'project' => 20, 
            'assignment' => 60,
            'assessment' => 12,
            'exam' => 40,
            'total' => 56,
            'grade' => 'C',
        ]);

        \App\Models\ResultDetail::create([
            'result_id' => 4,
            'subject_id' => '8',
            'project' => 20, 
            'assignment' => 60,
            'assessment' => 12,
            'exam' => 40,
            'total' => 56,
            'grade' => 'C',
        ]);

        \App\Models\ResultDetail::create([
            'result_id' => 4,
            'subject_id' => '9',
            'project' => 20, 
            'assignment' => 60,
            'assessment' => 12,
            'exam' => 40,
            'total' => 56,
            'grade' => 'C',
        ]);
    }
}
