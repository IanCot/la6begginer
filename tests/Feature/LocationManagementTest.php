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
        $response = $this->post('/miejscowosci',[
            'name'=>'Świdnica',
            'voivodeship'=>'Dolnośląskie'
        ]);
        $response->assertOk();
        $this->assertCount(1,Location::all());
   }
   /** @test */
   public function a_name_is_require(){
      
        $response = $this->post('/miejscowosci',[
            'name'=>'',
            'voivodeship'=>'Dolnośląskie'
        ]);
        $response->assertSessionHasErrors('name');
   }
   /** @test */
   public function a_voivodeship_is_require(){
       $response = $this->post('/miejscowosci',[
           'name'=>'Świdnica',
           'voivodeship'=>''
       ]);
       $response->assertSessionHasErrors('voivodeship');
   }
   /** @test */
   public function a_location_can_be_updated(){
        $this->withoutExceptionHandling();
        $this->post('/miejscowosci',[
            'name'=>'Świdnica',
            'voivodeship'=>'Dolnośląskie'
        ]);
        $this->assertCount(1,Location::all());
        $location = Location::first();
        $this->patch('/miejscowosci/'.$location->id,[
            'name'=>'Świdnica Śląska',
            'voivodeship'=>'Śląśkie'
        ]);
        $this->assertEquals('Świdnica Śląska' ,Location::first()->name);
        $this->assertEquals('Śląśkie' ,Location::first()->voivodeship);
   }

   /** @test */
   public function a_location_can_be_deleted(){
    $this->withoutExceptionHandling();
    $this->post('/miejscowosci',[
        'name'=>'Świdnica',
        'voivodeship'=>'Dolnośląskie'
    ]);
    $this->assertCount(1,Location::all());
    $location = Location::first();
    $this->delete('/miejscowosci/'.$location->id);
    $this->assertCount(0,Location::all());
    $this->assertCount(1,Location::onlyTrashed()->get());
   }
}
