<?php

namespace Tests\Unit;

use \App\Voivodeship;
use \App\City;
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
}
