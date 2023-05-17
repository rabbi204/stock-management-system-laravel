<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Factory as Faker;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $category_data = [
            [
                'name' => 'Fertilizer',
                'description' => 'Pesticides are chemical compounds that are used to kill pests, including insects, rodents, fungi and unwanted plants (weeds)'
            ],
            [
                'name' => 'Pesticides',
                'description' => 'A fertiliser is a natural or artificial substance containing chemical elements (such as Nitrogen (N), Phosphorus (P) and Potassium (K)) that improve growth and productiveness of plants.'
            ]
        ];

        foreach($category_data as $category){
            Category::create($category);
        }
    }
}
