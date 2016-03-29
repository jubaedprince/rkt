<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'locations';

    protected $fillable = ['name'];

    public function onday_origin(){
        return $this->hasMany('App\Onday', 'location_id_origin');
    }

    public function onday_destination(){
        return $this->hasMany('App\Onday', 'location_id_destination');
    }

}
