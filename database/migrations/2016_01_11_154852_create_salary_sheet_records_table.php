<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalarySheetRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salary_sheet_records', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('salary_sheet_id')->unsigned();
            $table->integer('employee_id')->unsigned();
            $table->integer('basic_salary');
            $table->integer('allowance');
            $table->integer('conveyance');
            $table->integer('gross_salary');
            $table->integer('total_advance');
            $table->integer('previous_advance_balance');
            $table->integer('deduction_this_month');
            $table->integer('rest_advance');
            $table->integer('net_payable');
            $table->boolean('paid');
            $table->date('pay_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('salary_sheet_records');
    }
}
