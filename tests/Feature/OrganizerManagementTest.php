<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Organizer;

class OrganizerManagementTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function a_organizer_can_be_added(){
        $this->withoutExceptionHandling();
        $response = $this->post('/organizatorzy',$this->data());
        $this->assertCount(1,Organizer::all());
        $organizer = Organizer::first();
        $response->assertRedirect($organizer->path());
    }
    /**
     * @test
     */
    public function a_name_is_required(){
        $response = $this->post('/organizatorzy',array_merge($this->data(),['name'=>'']));
        $response->assertSessionHasErrors('name');
    }
    /**
     * @test
     */
    public function a_representativ_is_required(){
        $response = $this->post('/organizatorzy',array_merge($this->data(),['representativ'=>'']));
        $response->assertSessionHasErrors('representativ');
    }
    /**
     * @test
     */
    public function a_email_is_required(){
        $response = $this->post('/organizatorzy',array_merge($this->data(),['email'=>'']));
        $response->assertSessionHasErrors('email');
    }
    /**
     * @test
     */
    public function a_phone_is_required(){
        $response = $this->post('/organizatorzy',array_merge($this->data(),['phone'=>'']));
        $response->assertSessionHasErrors('phone');
    }
    /**
     * @test
     */
    public function a_organizer_can_be_updated(){
        $this->withoutExceptionHandling();
        $response = $this->post('/organizatorzy',$this->data());
        $organizer = Organizer::first();
        $response =$this->patch('/organizatorzy/'.$organizer->id,[
            'name'=>'Maratony Małopolskie',
            'representativ'=>'Agata Bieg',
            'email'=>'agata.bieg@maraton.pl',
            'phone'=> '100 000 000'
        ]);
        $this->assertEquals('Maratony Małopolskie' ,Organizer::first()->name);
        $this->assertEquals('Agata Bieg' ,Organizer::first()->representativ);
        $this->assertEquals('agata.bieg@maraton.pl',Organizer::first()->email);
        $this->assertEquals('100 000 000' ,Organizer::first()->phone);
        $response->assertRedirect( $organizer->path());
    }
    /**
     * @test
     */
    public function a_organizer_can_be_deleted(){
        $this->withoutExceptionHandling();
        $this->post('/organizatorzy',$this->data());
        $this->assertCount(1,Organizer::all());
        $organizer = Organizer::first();
        $response = $this->delete('/organizatorzy/'.$organizer->id);
        $this->assertCount(0,Organizer::all());
        $this->assertCount(1,Organizer::onlyTrashed()->get());
        $response->assertRedirect('/organizatorzy');
    }
    private function data(){
        return [
            'name'=>'Maratony polskie',
            'representativ'=>'Agata Biegaczka',
            'email'=>'agata.biegaczka@maraton.pl',
            'phone'=> '000 000 000'
        ];
    }
}
