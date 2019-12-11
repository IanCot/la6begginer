<?php

namespace App\Http\Controllers;

use App\Voivodeship;
use Illuminate\Http\Request;

class VoivodeshipsController extends Controller
{
    public function store(){
       $voivodeship =  Voivodeship::create($this->validateRequest());
        return \redirect($voivodeship->path());
    }
    public function update(Voivodeship $viovodeship){
        $viovodeship->update($this->validateRequest());
        return \redirect($viovodeship->path());
    }
    public function destroy(Voivodeship $viovodeship){
        $viovodeship->delete();
        return \redirect('/wojewodztwa');
    }
     /**
     * @return mixin
     */
    protected function validateRequest(){
        return  \request()->validate([
            'name'=>'required',
            ]);
    }
}
