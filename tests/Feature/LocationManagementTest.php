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
        $response = $this->post('/lokalizacje',$this->data());
        $this->assertCount(1,Location::all());
        $location = Location::first();
        $response->assertRedirect( $location->path());
   }
   /** @test */
   public function a_name_is_require(){
      
        $response = $this->post('/lokalizacje',array_merge($this->data(),['name'=>'']));
        $response->assertSessionHasErrors('name');
   }
   /** @test */
   public function a_city_id_is_require(){
       $response = $this->post('/lokalizacje',array_merge($this->data(),['city_id'=>'']));
       $response->assertSessionHasErrors('city_id');
   }
   /** @test */
   public function a_location_can_be_updated(){
        $this->withoutExceptionHandling();
        $this->post('/lokalizacje',$this->data());
        $this->assertCount(1,Location::all());
        $location = Location::first();
        $response =$this->patch('/lokalizacje/'.$location->id,[
            'name'=>'Świdnica Śląska',
            'city_id'=>2
        ]);
        $this->assertEquals('Świdnica Śląska' ,Location::first()->name);
        $this->assertEquals(2 ,Location::first()->city_id);
        $response->assertRedirect( $location->path());
   }

   /** @test */
   public function a_location_can_be_deleted(){
    $this->withoutExceptionHandling();
    $this->post('/lokalizacje',$this->data());
    $this->assertCount(1,Location::all());
    $location = Location::first();
    $response = $this->delete('/lokalizacje/'.$location->id);
    $this->assertCount(0,Location::all());
    $this->assertCount(1,Location::onlyTrashed()->get());
    $response->assertRedirect('/lokalizacje');
   }
/**
 * @return array
 */
   private function data(){
       return [
        'name'=>'Świdnica',
        'city_id'=>1
       ];
   }
}
