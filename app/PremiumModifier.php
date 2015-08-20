<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PremiumModifier extends Model
{
    /**
    * Calculates the Premium Modifier to use based on age.
    */
    static function calc($age) {
    	$modifier = PremiumModifier::where('age', '<=', $age)->orderBy('age', 'desc')->limit(1)->first();
    	if($modifier) {
    		return $modifier->modifier;
    	} else {
    		throw new \Exception('Failed to calculate Premium Modifier with age: ' . $age);
    	}
    }
}
