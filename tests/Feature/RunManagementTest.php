<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Run;

class RunManagementTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function a_run_can_be_added(){
        $response = $this->post('/biegi',$this->data());
        $this->assertCount(1,Run::all());
        $response->assertRedirect( Run::first()->path());
    }
    /**
     * @test
     */
    public function a_name_is_required(){
        $response = $this->post('/biegi',array_merge($this->data(),['name'=>'']));
        $response->assertSessionHasErrors('name');
    }
    /**
     * @test
     */
    public function a_distance_is_required(){
        $response = $this->post('/biegi',array_merge($this->data(),['distance'=>'']));
        $response->assertSessionHasErrors('distance');
    }
    /**
     * @test
     */
    public function a_location_id_is_required(){
        $response = $this->post('/biegi',array_merge($this->data(),['location_id'=>'']));
        $response->assertSessionHasErrors('location_id');
    }
     /**
     * @test
     */
    public function a_start_date_is_required(){
        $response = $this->post('/biegi',array_merge($this->data(),['start_date'=>'']));
        $response->assertSessionHasErrors('start_date');
    }
     /**
     * @test
     */
    public function a_start_date_must_be_in_future(){
        $response = $this->post('/biegi',array_merge($this->data(),['start_date'=>'2015-12-22']));
        $response->assertSessionHasErrors('start_date');
    }
     /**
     * @test
     */
    public function a_description_can_be_null(){
       // $this->withoutExceptionHandling();
        $response = $this->post('/biegi',array_merge($this->data(),['description'=>'']));
        $this->assertCount(1,Run::all());
        $response->assertRedirect( Run::first()->path());
    }
    /**
     * @test
     */
    public function a_run_can_be_updated(){
        $this->post('/biegi',$this->data());
        $this->assertCount(1,Run::all());
        $response = $this->patch('/biegi/'.Run::first()->id,[
            'name'=>'VI bieg Cardio Bunny',
            'description'=>'',
            'distance'=>'10 km',
            'location_id'=>2,
            'start_date'=>'2020-02-22'
        ]);
        $run = Run::first();
        $this->assertEquals('VI bieg Cardio Bunny',$run->name);
        $this->assertEquals('',$run->description);
        $this->assertEquals('10 km',$run->distance);
        $this->assertEquals('2',$run->location_id);
        $this->assertEquals('2020-02-22',$run->start_date);
        $response->assertRedirect($run->path());
    }
    /**
     * @test
     */
    public function a_run_can_be_deleted(){
        $this->withoutExceptionHandling();
        $this->post('/biegi',$this->data());
        $this->assertCount(1,Run::all());
        $response = $this->delete(Run::first()->path());
        $this->assertCount(0,Run::all());
        $response->assertRedirect('/biegi');
    }
    private function data(){
        return[
            'name'=>'V bieg Cardio Bunny',
            'description'=>'Bieg za króliczkiem wielkanocnym',
            'distance'=>'5 km',
            'location_id'=>1,
            'start_date'=>'2020-12-12'
        ];
    }
}
