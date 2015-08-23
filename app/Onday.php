<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Onday extends Model
{
    protected $table = 'ondays';

    protected $fillable = ['type', 'activity_id', 'customer_id', 'location_id_origin', 'location_id_destination', 'cost', 'fare', 'market_price'];

    public function activity(){
        return $this->belongsTo('App\Activity');
    }

    public function customer(){
        return $this->belongsTo('App\Customer', 'customer_id');
    }

    public function location_origin(){
        return $this->belongsTo('App\Location', 'location_id_origin');
    }

    public function location_destination(){
        return $this->belongsTo('App\Location', 'location_id_destination' );
    }


}