<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Location extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public function runs(){
        return $this->hasMany('App\Run');
    }
    public function city()
    {
        return $this->belongsTo('App\City');
    }
    public function path(){
        return '/lokalizacje/'.$this->id;
    }
}
