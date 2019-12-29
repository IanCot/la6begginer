<?php

namespace Tests\Unit;
use App\Organizer;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrganizerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function a_organizer_is_recorded(){
        Organizer::create([
            'name'=>'Maratony polskie',
            'representativ'=>'Agata Biegaczka',
            'email'=>'agata.biegaczka@maraton.pl',
            'phone'=> '000 000 000'
        ]);
        $this->assertCount(1,Organizer::all());
    }
}
