<?php

namespace Tests\Unit;
use \App\City;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CityTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function a_city_is_recorded(){
        City::create([
            'name'=>'Smolec',
            'postcode'=>'58-654',
            'voivodeship_id'=>1
        ]);
        $this->assertCount(1,City::all());
    }
}
