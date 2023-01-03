<?php

namespace Tests\Feature;

use App\Http\Controllers\ClassroomController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Tests\TestCase;

class ClassroomTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testStoreMethod()
    {
        $request = new Request([
            'classroom_category_id' => 1,
            'classroom_name' => 'Class 1',
            'classroom_section' => 'A',
            'classroom_code' => 'CODE1',
        ]);
    
        $response = $this->classroomController->store($request);
    
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertDatabaseHas('classrooms', [
            'classroom_category_id' => 1,
            'classroom_name' => 'Class 1',
            'classroom_section' => 'A',
            'classroom_code' => 'CODE1',
        ]);
    }
}


