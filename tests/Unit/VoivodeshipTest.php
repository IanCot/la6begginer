<?php

namespace Tests\Unit;

use \App\Voivodeship;
use \App\City;
use \App\Location;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VoivodeshipTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function a_voivodeship_is_recorded(){
        Voivodeship::create([
            'name'=>'Dolnoślaskie'
        ]);
        $this->assertCount(1,Voivodeship::all());
    }
    /**
     * @test
     */
    public function a_voivodeship_has_cities(){
        $voivodeship = \factory(Voivodeship::class)->create();
        for($i=0;$i<3;$i++){
            $voivodeship->cities()->save(\factory(City::class)->create());
        }
        $this->assertCount(3,$voivodeship->cities);
    }
    /**
     * @test
     */
    public function a_voivodeship_has_locations(){
        $voivodeship = \factory(Voivodeship::class)->create();
        for($i=0;$i<3;$i++){
            $voivodeship->cities()->save(\factory(City::class)->create());
        }
        City::all()->each(function($city){
            $city->locations()->save(\factory(Location::class)->create());
        });
        $this->assertCount(3,$voivodeship->locations);
       $this->assertInstanceOf(Location::class,$voivodeship->locations[0]);
    }
}
