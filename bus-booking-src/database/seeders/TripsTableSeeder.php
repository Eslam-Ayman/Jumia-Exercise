<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Trip;

class TripsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $trips = [
            [
            	'trip' => ['bus_id' => 1, 'title' => 'Cairo-Asyut'],
            	'stations' => [
            		['city_id' => 6, 'order_column' => 1],
            		['city_id' => 9, 'order_column' => 2],
            		['city_id' => 17, 'order_column' => 4],
            		['city_id' => 2, 'order_column' => 3],
            	]
        	],
            [
            	'trip' => ['bus_id' => 2, 'title' => 'Giza-Alex'],
            	'stations' => [
            		['city_id' => 11, 'order_column' => 1],
            		['city_id' => 1, 'order_column' => 2],
            	]
        	],
            [
            	'trip' => ['bus_id' => 3, 'title' => 'Asyut-AlFayyum'],
            	'stations' => [
            		['city_id' => 2, 'order_column' => 1],
            		['city_id' => 17, 'order_column' => 2],
            		['city_id' => 9, 'order_column' => 3],
            	]
        	],
        ];

        foreach($trips as $key => $item) {
        	$trip = Trip::create($item['trip']);
        	$trip->stations()->createMany($item['stations']);
        }
    }
}
