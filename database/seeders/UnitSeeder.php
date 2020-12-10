<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Unit;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $total_meters = 7055.82;

        if (($handle = fopen(database_path("seeders/units.csv"), "r")) !== FALSE) {
            while(($unit = fgetcsv($handle,100,','))!== FALSE){
                Unit::create([
                    "unit_number"=>$unit[2], 
                    "owner"=>$unit[1], 
                    "square_meters"=>$unit[0], 
                    "percentage"=>$unit[0] / $total_meters
                ]);
            }
        }    
    }
}
