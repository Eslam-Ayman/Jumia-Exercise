<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $cities = [
            ['name' => 'Alexandria'],
            ['name' => 'Assiut'],
            ['name' => 'Aswan'],
            ['name' => 'Beheira'],
            ['name' => 'Bani Suef'],
            ['name' => 'Cairo'],
            ['name' => 'Daqahliya'],
            ['name' => 'Damietta'],
            ['name' => 'Fayyoum'],
            ['name' => 'Gharbiya'],
            ['name' => 'Giza'],
            ['name' => 'Helwan'],
            ['name' => 'Ismailia'],
            ['name' => 'Kafr El Sheikh'],
            ['name' => 'Luxor'],
            ['name' => 'Marsa Matrouh'],
            ['name' => 'Minya'],
            ['name' => 'Monofiya'],
            ['name' => 'New Valley'],
            ['name' => 'North Sinai'],
            ['name' => 'Port Said'],
            ['name' => 'Qalioubiya'],
            ['name' => 'Qena'],
            ['name' => 'Red Sea'],
            ['name' => 'Sharqiya'],
            ['name' => 'Sohag'],
            ['name' => 'South Sinai'],
            ['name' => 'Suez'],
            ['name' => 'Tanta'],
        ];

        \App\Models\City::insert($cities);
    }
}
