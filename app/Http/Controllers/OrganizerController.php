<?php

namespace App\Http\Controllers;

use App\Organizer;
use Illuminate\Http\Request;

class OrganizerController extends Controller
{
    public function store(){
        $organizer = Organizer::create($this->validateRequest());
        return \redirect($organizer->path());
    }
    public function update(Organizer $organizer){
        $organizer->update($this->validateRequest());
        return \redirect($organizer->path());
    }
    public function destroy(Organizer $organizer){
        $organizer->delete();
        return \redirect('/organizatorzy');
    }
     /**
     * @return mixin
     */
    protected function validateRequest(){
        return  \request()->validate([
            'name'=>'required',
            'representativ'=>'required',
            'email'=>'required',
            'phone'=>'required'
            ]);
    }
}
