<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;

class LocationsController extends Controller
{
    public function store(){
       $location =  Location::create($this->validateRequest());
       return \redirect('/lokalizacje/'.$location->id);
    }
    public function update(Location $location){
        $location->update($this->validateRequest());
        return \redirect('/lokalizacje/'.$location->id);
    }
    public function destroy(Location $location){
        $location->delete();
        return \redirect('/lokalizacje');
    }
    /**
     * @return mixin
     */
    protected function validateRequest(){
        return  \request()->validate([
            'name'=>'required',
            'city_id'=>'required'
            ]);
    }
}
