<?php

use Illuminate\Database\Seeder;
use App\PremiumModifier;


class PremiumModifierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('premium_modifiers')->delete();

        PremiumModifier::create(['age' => 0, 'modifier' => 0.635]);
        PremiumModifier::create(['age' => 20, 'modifier' => 0.635]);
        PremiumModifier::create(['age' => 21, 'modifier' => 1]);
        PremiumModifier::create(['age' => 22, 'modifier' => 1]);
        PremiumModifier::create(['age' => 23, 'modifier' => 1]);
        PremiumModifier::create(['age' => 24, 'modifier' => 1]);
        PremiumModifier::create(['age' => 25, 'modifier' => 1.004]);
        PremiumModifier::create(['age' => 26, 'modifier' => 1.024]);
        PremiumModifier::create(['age' => 27, 'modifier' => 1.048]);
        PremiumModifier::create(['age' => 28, 'modifier' => 1.087]);
        PremiumModifier::create(['age' => 29, 'modifier' => 1.119]);
        PremiumModifier::create(['age' => 30, 'modifier' => 1.135]);
        PremiumModifier::create(['age' => 31, 'modifier' => 1.159]);
        PremiumModifier::create(['age' => 32, 'modifier' => 1.183]);
        PremiumModifier::create(['age' => 33, 'modifier' => 1.198]);
        PremiumModifier::create(['age' => 34, 'modifier' => 1.214]);
        PremiumModifier::create(['age' => 35, 'modifier' => 1.222]);
        PremiumModifier::create(['age' => 36, 'modifier' => 1.23]);
        PremiumModifier::create(['age' => 37, 'modifier' => 1.238]);
        PremiumModifier::create(['age' => 38, 'modifier' => 1.246]);
        PremiumModifier::create(['age' => 39, 'modifier' => 1.262]);
        PremiumModifier::create(['age' => 40, 'modifier' => 1.278]);
        PremiumModifier::create(['age' => 41, 'modifier' => 1.302]);
        PremiumModifier::create(['age' => 42, 'modifier' => 1.325]);
        PremiumModifier::create(['age' => 43, 'modifier' => 1.357]);
        PremiumModifier::create(['age' => 44, 'modifier' => 1.397]);
        PremiumModifier::create(['age' => 45, 'modifier' => 1.444]);
        PremiumModifier::create(['age' => 46, 'modifier' => 1.5]);
        PremiumModifier::create(['age' => 47, 'modifier' => 1.563]);
        PremiumModifier::create(['age' => 48, 'modifier' => 1.635]);
        PremiumModifier::create(['age' => 49, 'modifier' => 1.706]);
        PremiumModifier::create(['age' => 50, 'modifier' => 1.786]);
        PremiumModifier::create(['age' => 51, 'modifier' => 1.865]);
        PremiumModifier::create(['age' => 52, 'modifier' => 1.952]);
        PremiumModifier::create(['age' => 53, 'modifier' => 2.04]);
        PremiumModifier::create(['age' => 54, 'modifier' => 2.135]);
        PremiumModifier::create(['age' => 55, 'modifier' => 2.23]);
        PremiumModifier::create(['age' => 56, 'modifier' => 2.333]);
        PremiumModifier::create(['age' => 57, 'modifier' => 2.437]);
        PremiumModifier::create(['age' => 58, 'modifier' => 2.548]);
        PremiumModifier::create(['age' => 59, 'modifier' => 2.603]);
        PremiumModifier::create(['age' => 60, 'modifier' => 2.714]);
        PremiumModifier::create(['age' => 61, 'modifier' => 2.81]);
        PremiumModifier::create(['age' => 62, 'modifier' => 2.873]);
        PremiumModifier::create(['age' => 63, 'modifier' => 2.952]);
        PremiumModifier::create(['age' => 64, 'modifier' => 3]);
    }
}
