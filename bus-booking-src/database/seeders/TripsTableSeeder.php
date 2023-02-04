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
            	'trip' => ['bus_id' => 1, 'title' => 'Cairo-Asyut', 'departure_at'=> '2023-02-10 00:00:00'],
            	'stations' => [
            		['city_id' => 6, 'order_column' => 1],
            		['city_id' => 9, 'order_column' => 2],
            		['city_id' => 17, 'order_column' => 3],
            		['city_id' => 2, 'order_column' => 4],
            	]
        	],
            [
            	'trip' => ['bus_id' => 2, 'title' => 'Giza-Alex', 'departure_at'=> '2023-02-10 00:00:00'],
            	'stations' => [
            		['city_id' => 11, 'order_column' => 1],
            		['city_id' => 1, 'order_column' => 2],
            	]
        	],
            [
            	'trip' => ['bus_id' => 3, 'title' => 'Asyut-AlFayyum', 'departure_at'=> '2023-02-10 00:00:00'],
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
