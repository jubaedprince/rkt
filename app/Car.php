<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'cars';

    protected $fillable = ['name'];

    public function activity(){
        return $this->hasOne('App\Activity');
    }

    //public function lists()
}
