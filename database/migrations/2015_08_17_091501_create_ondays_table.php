<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOndaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ondays', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('type'); //1 import 0 export 2 other
            $table->integer('activity_id');
            $table->integer('customer_id');
            $table->integer('location_id_origin');
            $table->integer('location_id_destination');
            $table->integer('cost');
            $table->integer('fare');
            $table->integer('market_price');

//            $table->foreign('activity_id')->references('id')->on('activities');
//            $table->foreign('customer_id')->references('id')->on('customers');
//            $table->foreign('location_id_origin')->references('id')->on('locations');
//            $table->foreign('location_id_destination')->references('id')->on('locations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ondays');
    }
}
