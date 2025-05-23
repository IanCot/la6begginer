<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class City extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function voivodeship()
    {
        return $this->belongsTo('App\Voivodeship');
    }
    public function locations()
    {
        return $this->hasMany('App\Location');
    }
    public function path(){
        return '/miejscowosci/'.$this->id;
    }
}