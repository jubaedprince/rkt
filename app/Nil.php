<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nil extends Model
{
    protected $table = 'nils';

    protected $fillable = ['cost', 'activity_id'];

    public function activity(){
        return $this->belongsTo('App\Activity');
    }
}
