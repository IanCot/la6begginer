<?php

namespace Tests\Unit;
use \App\City;
use \App\Voivodeship;
use \App\Location;
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
            'voivodeship_id'=>1,
            'county' => 'Wrocławski' // Added county
        ]);
        $this->assertCount(1,City::all());
    }
    /**
     * @test
     */
    public function a_city_has_voivodeship(){
        $city = City::factory()->create();
        $this->assertInstanceOf(Voivodeship::class,$city->voivodeship);
    }
    /**
     * @test
     */
    public function a_city_has_locations(){
        $city = City::factory()->create();
        for($i=0;$i<3;$i++){
            $city->locations()->save(Location::factory()->create());
        }
        $this->assertCount(3,$city->locations);
        $this->assertInstanceOf(Location::class,$city->locations[0]);
    }
}
