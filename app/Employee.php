<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';

    protected $fillable = ['name', 'present_address', 'permanent_address', 'mobile', 'national_id',
        'designation', 'photo', 'raid', 'status', 'email'];

    public function attachments(){
        return $this->hasMany('App\Attachment');
    }

    public function salarySheetRecords(){
        return $this->hasMany('App\SalarySheetRecord');
    }

}
