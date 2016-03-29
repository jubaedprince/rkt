<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nils', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('activity_id');
            $table->integer('cost');
            $table->timestamps();
     //       $table->foreign('activity_id')->references('id')->on('activities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('nils');
    }
}
