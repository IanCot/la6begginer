<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Run extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function location(){
        return $this->belongsTo('App\Location');
    }
    public function path(){
        return '/biegi/'.$this->id;
    }
}
