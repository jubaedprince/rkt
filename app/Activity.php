<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activities';

    protected $fillable = ['date', 'car_id', 'comment'];

    public function car(){
        return $this->belongsTo('App\Car');
    }

    public function maintenance(){
        return $this->hasOne('App\Maintenance');
    }

    public function nil(){
        return $this->hasOne('App\Nil');
    }

    public function onday(){
        return $this->hasOne('App\Onday');
    }
}
