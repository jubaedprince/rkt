<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';

    protected $fillable = ['name'];

    public function maintenance(){
        return $this->belongsTo('App\Maintenance');
    }
}
