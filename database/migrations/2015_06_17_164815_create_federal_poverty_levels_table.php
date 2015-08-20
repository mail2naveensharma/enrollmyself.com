<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFederalPovertyLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('federal_poverty_levels', function (Blueprint $table) {
            $table->increments('id');

            // Our columns
            $table->integer('household_size');
            $table->integer('income');
            $table->float('percentage');

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
        Schema::drop('federal_poverty_levels');
    }
}
