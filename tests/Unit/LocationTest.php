<?php

namespace Tests\Unit;

use \App\Location;
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
}
