<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $table = 'attachments';

    protected $fillable = ['name', 'location'];

    protected $guarded = ['employee_id'];

    public function employee(){
        return $this->belongsTo('App\Employee');
    }
}
