<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

    protected $fillable = ['name'];

    public function onday(){
        return $this->hasMany('App\Onday', 'customer_id');
    }
}
