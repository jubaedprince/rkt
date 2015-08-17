<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $table = 'maintenances';

    protected $fillable = ['activity_id'];

    public function items(){
        return $this->belongsToMany('App\Item')->withPivot('cost');
    }

    public function activity(){
        return $this->belongsTo('App\Activity');
    }

}
