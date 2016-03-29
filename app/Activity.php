<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activities';

    protected $fillable = ['car_id', 'comment'];

    protected $appends = ['type', 'cost', 'fare', 'market_price'];

    protected $dates = ['date'];

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

    public function getTypeAttribute()
    {
        if ($this->onday){
            return "On Day";
        }
        else if ($this->maintenance){
            return "Maintenance";
        }

        else if ($this->nil){
            return "Nil";
        }
        else return "";
    }

    public function getCostAttribute()
    {
        if ($this->onday){
            return $this->onday->cost;
        }
        else if ($this->maintenance){
            return $this->maintenance->cost;
        }

        else if ($this->nil){
            return $this->nil->cost;
        }
        else return "";
    }

    public function getFareAttribute()
    {
        if ($this->onday){
            return $this->onday->fare;
        }
        else if ($this->maintenance){
            return '0';
        }

        else if ($this->nil){
            return '0';
        }
        else return "";
    }

    public function getMarketPriceAttribute()
    {
        if ($this->onday){
            return $this->onday->market_price;
        }
        else if ($this->maintenance){
            return 0;
        }

        else if ($this->nil){
            return 0;
        }
        else return "";
    }

    public static function getActivityOfOneMonth($month, $year){
        $date = Carbon::create($year, $month, 1, 0);
        $initial_date = $date->toDateString();
        $last_date =  $date->addMonth()->subDay()->toDateString();
        $trucks = Car::lists('name');
        $activities = Activity::where('date', '>=', $initial_date)->where('date', '<=', $last_date)->get();
        return $activities;
    }

}
