<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Location extends Model
{
    use HasFactory, SoftDeletes;
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
