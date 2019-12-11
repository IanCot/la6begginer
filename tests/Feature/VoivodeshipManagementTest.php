<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Voivodeship;

class VoivodeshipManagementTest extends TestCase
{
    use RefreshDatabase;
   /** @test */
   public function a_viovodeship_can_be_added(){
    $this->withoutExceptionHandling();
    $response = $this->post('/wojewodztwa',[
        'name'=>'Dolnośląskie',
    ]);
    $this->assertCount(1,Voivodeship::all());
    $viovodeship = Voivodeship::first();
    $response->assertRedirect( $viovodeship->path());
   }
   /** @test */
   public function a_name_is_require(){
    $response = $this->post('/wojewodztwa',[
        'name'=>'',
    ]);
    $response->assertSessionHasErrors('name');
   }
   /** @test */
   public function a_viovodeship_can_be_updated(){
    $this->withoutExceptionHandling();
    $this->post('/wojewodztwa',[
        'name'=>'Dolnośląskie',
    ]);
    $this->assertCount(1,Voivodeship::all());
    $viovodeship = Voivodeship::first();
    $response = $this->patch('/wojewodztwa/'.$viovodeship->id,[
        'name'=>'Śląśkie'
    ]);
    $this->assertEquals('Śląśkie' ,Voivodeship::first()->name);
    $response->assertRedirect( $viovodeship->path());

   }
   /** @test */
   public function a_viovodeship_can_be_deleted(){
    $this->withoutExceptionHandling();
    $this->post('/wojewodztwa',[
        'name'=>'Dolnośląskie',
    ]);
    $this->assertCount(1,Voivodeship::all());
    $viovodeship = Voivodeship::first();
    $response = $this->delete('/wojewodztwa/'.$viovodeship->id);
    $this->assertCount(0,Voivodeship::all());
    $this->assertCount(1,Voivodeship::onlyTrashed()->get());
    $response->assertRedirect('/wojewodztwa');
   }
}
