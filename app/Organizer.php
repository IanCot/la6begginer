<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Organizer extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function path(){
        return '/organizatorzy/'.$this->id;
    }
}
