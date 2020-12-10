<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Email;
use App\Models\Unit;

class EmailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $units = [
            ['unit'=>1003, 'email'=>'howard@skolnik.com', 'name'=>'Howard Skolnik'],
            ['unit'=>802, 'email'=>'howard@skolnik.com', 'name'=>'Howard Skolnik'],
            ['unit'=>802, 'email'=>'robert@rjmchicago.com', 'name' =>'Robert Milanowski'],
            ['unit'=>1003, 'email'=>'robert@rjmchicago.com', 'name' =>'Robert Milanowski'],
        ];

        foreach ($units as $unit) {
            $u = Unit::where('unit_number', $unit['unit'])->first();
            Email::create([
                'unit_id'=>$u->id, 
                'email'=>$unit['email'],
                'name'=>$unit['name'],
            ]);
        }
    }
}
