<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\City;
class CityManagementTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function a_city_can_be_added(){
        $this->withoutExceptionHandling();
        $response = $this->post('/miejscowosci',$this->data());
        $this->assertCount(1,City::all());
        $location = City::first();
        $response->assertRedirect( $location->path());
    }

    private function data(){
        return [
            'name'=>'Świdnica',
            'voivodeship_id'=>1,
            'postcode'=>'58-100'
        ];
    }
}
