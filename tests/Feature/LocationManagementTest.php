<?php

namespace Tests\Feature;

use App\Location;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LocationManagmentTest extends TestCase
{
    use RefreshDatabase;
   /** @test */
   public function a_location_can_be_added(){
        $this->withoutExceptionHandling();
        $response = $this->post('/miejscowosci',$this->data());
        $this->assertCount(1,Location::all());
        $location = Location::first();
        $response->assertRedirect( $location->path());
   }
   /** @test */
   public function a_name_is_require(){
      
        $response = $this->post('/miejscowosci',array_merge($this->data(),['name'=>'']));
        $response->assertSessionHasErrors('name');
   }
   /** @test */
   public function a_voivodeship_is_require(){
       $response = $this->post('/miejscowosci',array_merge($this->data(),['voivodeship'=>'']));
       $response->assertSessionHasErrors('voivodeship');
   }
   /** @test */
   public function a_location_can_be_updated(){
        $this->withoutExceptionHandling();
        $this->post('/miejscowosci',$this->data());
        $this->assertCount(1,Location::all());
        $location = Location::first();
        $response =$this->patch('/miejscowosci/'.$location->id,[
            'name'=>'Świdnica Śląska',
            'voivodeship'=>'Śląśkie'
        ]);
        $this->assertEquals('Świdnica Śląska' ,Location::first()->name);
        $this->assertEquals('Śląśkie' ,Location::first()->voivodeship);
        $response->assertRedirect( $location->path());
   }

   /** @test */
   public function a_location_can_be_deleted(){
    $this->withoutExceptionHandling();
    $this->post('/miejscowosci',$this->data());
    $this->assertCount(1,Location::all());
    $location = Location::first();
    $response = $this->delete('/miejscowosci/'.$location->id);
    $this->assertCount(0,Location::all());
    $this->assertCount(1,Location::onlyTrashed()->get());
    $response->assertRedirect('/miejscowosci');
   }
/**
 * @return array
 */
   private function data(){
       return [
        'name'=>'Świdnica',
        'voivodeship'=>'Dolnośląskie'
       ];
   }
}
