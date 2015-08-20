<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeRateColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // First remove the $ sign
        DB::update('update rateswnames set PremiumChild = REPLACE(trim(PremiumChild), \'$\', \'\')');
        DB::update('update rateswnames set PremiumAdultIndividualAge21 = REPLACE(trim(PremiumAdultIndividualAge21), \'$\', \'\')');
        DB::update('update rateswnames set PremiumAdultIndividualAge27 = REPLACE(trim(PremiumAdultIndividualAge27), \'$\', \'\')');
        DB::update('update rateswnames set PremiumAdultIndividualAge30 = REPLACE(trim(PremiumAdultIndividualAge30), \'$\', \'\')');
        DB::update('update rateswnames set PremiumAdultIndividualAge40 = REPLACE(trim(PremiumAdultIndividualAge40), \'$\', \'\')');
        DB::update('update rateswnames set PremiumAdultIndividualAge50 = REPLACE(trim(PremiumAdultIndividualAge50), \'$\', \'\')');
        DB::update('update rateswnames set PremiumAdultIndividualAge60 = REPLACE(trim(PremiumAdultIndividualAge60), \'$\', \'\')');
   

        Schema::table('rateswnames', function($table) {
            $table->decimal('PremiumChild', 13,2)->change();
            $table->decimal('PremiumAdultIndividualAge21', 13,2)->change();;
            $table->decimal('PremiumAdultIndividualAge27', 13,2)->change();;
            $table->decimal('PremiumAdultIndividualAge30', 13,2)->change();;
            $table->decimal('PremiumAdultIndividualAge40', 13,2)->change();;
            $table->decimal('PremiumAdultIndividualAge50', 13,2)->change();;            
            $table->decimal('PremiumAdultIndividualAge60', 13,2)->change();;            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Down? Are you insane? Why would you want to do that?
    }
}
