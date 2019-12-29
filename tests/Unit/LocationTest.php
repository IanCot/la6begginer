<?php

namespace Tests\Unit;

use \App\Location;
use \App\City;
use App\Run;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LocationTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function a_location_is_recorded(){
        Location::create([
            'name'=>'Świdnica',
            'city_id'=>1
        ]);
        $this->assertCount(1,Location::all());
    }
    /**
     * @test
     */
    public function a_location_has_city(){
        $location = \factory(Location::class)->create();
        $this->assertInstanceOf(City::class,$location->city);
    }  
    /**
     * @test
     */
    public function a_location_has_runs(){
        $location = \factory(Location::class)->create();
        $location->runs()->save(\factory(Run::class)->create());
        $location->runs()->save(\factory(Run::class)->create());
        $location->runs()->save(\factory(Run::class)->create());
        $this->assertCount(3,$location->runs);
        $this->assertInstanceOf(Run::class,$location->runs[0]);
    }
    
}
