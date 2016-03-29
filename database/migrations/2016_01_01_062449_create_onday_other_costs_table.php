<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOndayOtherCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('onday_other_costs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('onday_id')->unsigned();
            $table->integer('onday_other_cost_item_id')->unsigned();
            $table->integer('cost');
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
        Schema::drop('onday_other_costs');
    }
}
