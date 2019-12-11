<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Voivodeship extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    
    public function path(){
        return '/wojewodztwa/'.$this->id;
    }
}
