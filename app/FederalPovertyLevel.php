<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Log;

class FederalPovertyLevel extends Model
{
    /**
    * Calculates the FPL based on household size and income.
    */
    static function calc($householdSize, $income) {
    	$level = FederalPovertyLevel::where('household_size', '<=', $householdSize)->where('percentage', 1)->orderBy('household_size', 'desc')->limit(1)->first();
    	if($level) {
    		// Give pretty exact float representation of percentage.  Remember to multiply by 100 in your consumer if needed!
            return $income / $level->income;
    	} else {
    		throw new \Exception('Failed to calculate FPL with household size: ' . $householdSize . ' and income: ' . $income);
    	}
    }
}
