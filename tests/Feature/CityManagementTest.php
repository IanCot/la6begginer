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
        $city = City::first();
        $response->assertRedirect( $city->path());
    }
    /**
     * @test
     */
    public function a_name_is_require(){
        $response = $this->post('/miejscowosci',array_merge($this->data(),['name'=>'']));
        $response->assertSessionHasErrors('name');
    }
     /**
     * @test
     */
    public function a_voivodeship_id_is_require(){
        $response = $this->post('/miejscowosci',array_merge($this->data(),['voivodeship_id'=>'']));
        $response->assertSessionHasErrors('voivodeship_id');
    }
     /**
     * @test
     */
    public function a_postcode_id_is_require(){
        $response = $this->post('/miejscowosci',array_merge($this->data(),['postcode'=>'']));
        $response->assertSessionHasErrors('postcode');
    }
    /**
     * @test
     */
    public function a_city_can_be_updated(){
        $this->withoutExceptionHandling();
        $response = $this->post('/miejscowosci',$this->data());
        $this->assertCount(1,City::all());
        $city = City::first();
        $response = $this->patch('/miejscowosci/'.$city->id,[
            'name'=>'Smolec',
            'postcode'=>'55-365',
            'voivodeship_id'=>1
        ]);
        $this->assertEquals('Smolec',City::first()->name);
        $this->assertEquals('55-365',City::first()->postcode);
        $this->assertEquals('1',City::first()->voivodeship_id);
        $response->assertRedirect( $city->path());
    }
    /**
     * @test
     */
    public function a_city_can_be_deleted(){
        $this->withoutExceptionHandling();
        $response = $this->post('/miejscowosci',$this->data());
        $this->assertCount(1,City::all());
        $city = City::first();
        $response = $this->delete('/miejscowosci/'.$city->id);
        $this->assertCount(0,City::all());
        $this->assertCount(1,City::onlyTrashed()->get());
        $response->assertRedirect('/miejscowosci');
    }
    private function data(){
        return [
            'name'=>'Świdnica',
            'voivodeship_id'=>1,
            'postcode'=>'58-100'
        ];
    }
}
