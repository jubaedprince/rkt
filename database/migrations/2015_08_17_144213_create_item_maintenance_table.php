<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemMaintenanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_maintenance', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_id');
            $table->integer('maintenance_id');
            $table->integer('cost');
            $table->timestamps();

//            $table->foreign('item_id')->references('id')->on('items');
//            $table->foreign('maintenance_id')->references('id')->on('maintenance');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('item_maintenance');
    }
}
