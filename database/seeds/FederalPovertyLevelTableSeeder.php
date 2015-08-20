<?php

use Illuminate\Database\Seeder;
use App\FederalPovertyLevel;

class FederalPovertyLevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('federal_poverty_levels')->delete();
        FederalPovertyLevel::create(['household_size' => 1, 'income' => 11670, 'percentage' => 1]);
        FederalPovertyLevel::create(['household_size' => 1, 'income' => 15521, 'percentage' => 1.33]);
        FederalPovertyLevel::create(['household_size' => 1, 'income' => 17505, 'percentage' => 1.5]);
        FederalPovertyLevel::create(['household_size' => 1, 'income' => 23340, 'percentage' => 2]);
        FederalPovertyLevel::create(['household_size' => 1, 'income' => 29175, 'percentage' => 2.5]);
        FederalPovertyLevel::create(['household_size' => 1, 'income' => 35010, 'percentage' => 3]);
        FederalPovertyLevel::create(['household_size' => 1, 'income' => 46680, 'percentage' => 4]);

        FederalPovertyLevel::create(['household_size' => 2, 'income' => 15730, 'percentage' => 1]);
        FederalPovertyLevel::create(['household_size' => 2, 'income' => 20921, 'percentage' => 1.33]);
        FederalPovertyLevel::create(['household_size' => 2, 'income' => 23595, 'percentage' => 1.5]);
        FederalPovertyLevel::create(['household_size' => 2, 'income' => 31460, 'percentage' => 2]);
        FederalPovertyLevel::create(['household_size' => 2, 'income' => 39325, 'percentage' => 2.5]);
        FederalPovertyLevel::create(['household_size' => 2, 'income' => 47190, 'percentage' => 3]);
        FederalPovertyLevel::create(['household_size' => 2, 'income' => 62920, 'percentage' => 4]);

        FederalPovertyLevel::create(['household_size' => 3, 'income' => 19790, 'percentage' => 1]);
        FederalPovertyLevel::create(['household_size' => 3, 'income' => 26321, 'percentage' => 1.33]);
        FederalPovertyLevel::create(['household_size' => 3, 'income' => 29685, 'percentage' => 1.5]);
        FederalPovertyLevel::create(['household_size' => 3, 'income' => 39580, 'percentage' => 2]);
        FederalPovertyLevel::create(['household_size' => 3, 'income' => 49475, 'percentage' => 2.5]);
        FederalPovertyLevel::create(['household_size' => 3, 'income' => 59370, 'percentage' => 3]);
        FederalPovertyLevel::create(['household_size' => 3, 'income' => 79160, 'percentage' => 4]);

        FederalPovertyLevel::create(['household_size' => 4, 'income' => 23850, 'percentage' => 1]);
        FederalPovertyLevel::create(['household_size' => 4, 'income' => 31721, 'percentage' => 1.33]);
        FederalPovertyLevel::create(['household_size' => 4, 'income' => 35775, 'percentage' => 1.5]);
        FederalPovertyLevel::create(['household_size' => 4, 'income' => 47700, 'percentage' => 2]);
        FederalPovertyLevel::create(['household_size' => 4, 'income' => 59625, 'percentage' => 2.5]);
        FederalPovertyLevel::create(['household_size' => 4, 'income' => 71550, 'percentage' => 3]);
        FederalPovertyLevel::create(['household_size' => 4, 'income' => 95400, 'percentage' => 4]);

        FederalPovertyLevel::create(['household_size' => 5, 'income' => 27910, 'percentage' => 1]);
        FederalPovertyLevel::create(['household_size' => 5, 'income' => 37120, 'percentage' => 1.33]);
        FederalPovertyLevel::create(['household_size' => 5, 'income' => 41865, 'percentage' => 1.5]);
        FederalPovertyLevel::create(['household_size' => 5, 'income' => 55820, 'percentage' => 2]);
        FederalPovertyLevel::create(['household_size' => 5, 'income' => 69775, 'percentage' => 2.5]);
        FederalPovertyLevel::create(['household_size' => 5, 'income' => 83730, 'percentage' => 3]);
        FederalPovertyLevel::create(['household_size' => 5, 'income' => 111640, 'percentage' => 4]);

        FederalPovertyLevel::create(['household_size' => 6, 'income' => 31970, 'percentage' => 1]);
        FederalPovertyLevel::create(['household_size' => 6, 'income' => 42520, 'percentage' => 1.33]);
        FederalPovertyLevel::create(['household_size' => 6, 'income' => 47955, 'percentage' => 1.5]);
        FederalPovertyLevel::create(['household_size' => 6, 'income' => 63940, 'percentage' => 2]);
        FederalPovertyLevel::create(['household_size' => 6, 'income' => 79925, 'percentage' => 2.5]);
        FederalPovertyLevel::create(['household_size' => 6, 'income' => 95910, 'percentage' => 3]);
        FederalPovertyLevel::create(['household_size' => 6, 'income' => 127880, 'percentage' => 4]);

        FederalPovertyLevel::create(['household_size' => 7, 'income' => 36030, 'percentage' => 1]);
        FederalPovertyLevel::create(['household_size' => 7, 'income' => 47920, 'percentage' => 1.33]);
        FederalPovertyLevel::create(['household_size' => 7, 'income' => 54045, 'percentage' => 1.5]);
        FederalPovertyLevel::create(['household_size' => 7, 'income' => 72060, 'percentage' => 2]);
        FederalPovertyLevel::create(['household_size' => 7, 'income' => 90075, 'percentage' => 2.5]);
        FederalPovertyLevel::create(['household_size' => 7, 'income' => 108090, 'percentage' => 3]);
        FederalPovertyLevel::create(['household_size' => 7, 'income' => 144120, 'percentage' => 4]);

        FederalPovertyLevel::create(['household_size' => 7, 'income' => 36030, 'percentage' => 1]);
        FederalPovertyLevel::create(['household_size' => 7, 'income' => 47920, 'percentage' => 1.33]);
        FederalPovertyLevel::create(['household_size' => 7, 'income' => 54045, 'percentage' => 1.5]);
        FederalPovertyLevel::create(['household_size' => 7, 'income' => 72060, 'percentage' => 2]);
        FederalPovertyLevel::create(['household_size' => 7, 'income' => 90075, 'percentage' => 2.5]);
        FederalPovertyLevel::create(['household_size' => 7, 'income' => 108090, 'percentage' => 3]);
        FederalPovertyLevel::create(['household_size' => 7, 'income' => 144120, 'percentage' => 4]);

    }
}
