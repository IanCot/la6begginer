<?php

namespace Tests\Unit;

use App\Run;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RunTest extends TestCase
{
    use RefreshDatabase;
    /**
    * @test
    */
    public function a_run_is_recorded(){
        Run::create([
            'name'=>'V bieg Cardio Bunny',
            'description'=>'Bieg za królikiem wielkanocnym',
            'distance'=>'5 km',
            'location_id'=>1,
            'start_date'=>'2020-01-12'
        ]);
        $this->assertCount(1,Run::all());
    }
}
