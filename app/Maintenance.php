<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $table = 'maintenances';

    protected $fillable = ['activity_id', 'cost', 'upload'];

    public function items(){
        return $this->belongsToMany('App\Item')->withPivot('id', 'cost');
    }

    public function activity(){
        return $this->belongsTo('App\Activity');
    }

    public function uploadImage($url){

    }
}
