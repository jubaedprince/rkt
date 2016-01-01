<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OndayOtherCost extends Model
{
    protected $table = 'onday_other_costs';

    protected $fillable = ['cost'];

    protected $guarded = ['onday_id', 'onday_other_cost_item_id'];


}
