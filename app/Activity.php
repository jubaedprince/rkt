<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activities';

    protected $fillable = ['date', 'car_id', 'comment'];

    public function car(){
        return $this->hasOne('App\Car');
    }
}
