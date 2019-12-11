<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;

class LocationsController extends Controller
{
    public function store(){
        Location::create($this->validateRequest());
    }
    public function update(Location $location){
        $location->update($this->validateRequest());
    }
    public function destroy(Location $location){
        $location->delete();
    }
    /**
     * @return mixin
     */
    protected function validateRequest(){
        return  \request()->validate([
            'name'=>'required',
            'voivodeship'=>'required'
            ]);
    }
}
