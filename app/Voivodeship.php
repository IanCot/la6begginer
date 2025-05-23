<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Voivodeship extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function cities()
    {
        return $this->hasMany('App\City');
    }
    public function locations()
    {
        return $this->hasManyThrough('App\Location', 'App\City');
    }
    public function path(){
        return '/wojewodztwa/'.$this->id;
    }
}
