<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\City;
class CityController extends Controller
{
    public function store(){
        $city = City::create($this->validateRequest());
        return \redirect('/miejscowosci/'.$city->id);
    }
    protected function validateRequest(){
        return  \request()->validate([
            'name'=>'required',
            'voivodeship_id'=>'required'
            ]);
    }
}
