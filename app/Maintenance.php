<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $table = 'maintenances';

    protected $fillable = ['amount'];

    public function item(){
        return $this->hasMany('App\Item');
    }

    public function activity(){
        return $this->hasOne('App\Activity');
    }

}
