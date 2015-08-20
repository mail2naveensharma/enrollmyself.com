<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CleanRatesColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::update('update zipcodes set ZipCode = replace(trim(ZipCode), \'\n\', \'\')');
        DB::update('update rateswnames set State = replace(trim(State), \'\n\', \'\')');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
