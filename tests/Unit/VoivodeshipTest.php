<?php

namespace Tests\Unit;

use \App\Voivodeship;
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
}
