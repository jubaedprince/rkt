<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalarySheet extends Model
{
    protected $table = 'salary_sheets';

    protected $fillable = ['date'];

    protected $dates = ['date'];

    public function salarySheetRecords(){
        return $this->hasMany('App\SalarySheetRecord');
    }

}
