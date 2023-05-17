<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unit_data = [
            [
                'unit_name' => 'Bag',
                'unit_short_name' => 'Bag',
                'unit_value' => '50',
                'description' => '50 kg = 1 bag'
            ],
            [
                'unit_name' => 'Box',
                'unit_short_name' => 'Box',
                'unit_value' => '12',
                'description' => '12 packet = 1 box'
            ],
            [
                'unit_name' => 'Pieces',
                'unit_short_name' => 'Pieces',
                'unit_value' => '1',
                'description' => '1 pieces'
            ],
        ];

        foreach($unit_data as $unit){
            Unit::create($unit);
        }
    }
}
