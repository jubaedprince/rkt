<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalarySheetRecord extends Model
{
    protected $table = 'salary_sheet_records';

    protected $fillable = ['salary_sheet_id',
        'employee_id', 'basic_salary', 'allowance',
        'conveyance', 'gross_salary', 'total_advance',
        'previous_advance_balance', 'deduction_this_month',
        'rest_advance', 'net_payable', 'paid', 'pay_date'
    ];

    protected $dates = ['pay_date'];

    public function salarySheet(){
        return $this->belongsTo('App\SalarySheet');
    }

    public function employee(){
        return $this->belongsTo('App\Employee');
    }
}
