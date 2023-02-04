<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SeatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $seats = [
            ['bus_id' => 1, 'title' => 'seat 1 of bus 1'],
            ['bus_id' => 1, 'title' => 'seat 2 of bus 1'],
            ['bus_id' => 1, 'title' => 'seat 3 of bus 1'],
            ['bus_id' => 1, 'title' => 'seat 4 of bus 1'],
            ['bus_id' => 1, 'title' => 'seat 5 of bus 1'],
            ['bus_id' => 1, 'title' => 'seat 6 of bus 1'],
            ['bus_id' => 1, 'title' => 'seat 7 of bus 1'],
            ['bus_id' => 1, 'title' => 'seat 8 of bus 1'],
            ['bus_id' => 1, 'title' => 'seat 9 of bus 1'],
            ['bus_id' => 1, 'title' => 'seat 10 of bus 1'],
            ['bus_id' => 1, 'title' => 'seat 11 of bus 1'],
            ['bus_id' => 1, 'title' => 'seat 12 of bus 1'],

            ['bus_id' => 2, 'title' => 'seat 1 of bus 2'],
            ['bus_id' => 2, 'title' => 'seat 2 of bus 2'],
            ['bus_id' => 2, 'title' => 'seat 3 of bus 2'],
            ['bus_id' => 2, 'title' => 'seat 4 of bus 2'],
            ['bus_id' => 2, 'title' => 'seat 5 of bus 2'],
            ['bus_id' => 2, 'title' => 'seat 6 of bus 2'],
            ['bus_id' => 2, 'title' => 'seat 7 of bus 2'],
            ['bus_id' => 2, 'title' => 'seat 8 of bus 2'],
            ['bus_id' => 2, 'title' => 'seat 9 of bus 2'],
            ['bus_id' => 2, 'title' => 'seat 10 of bus 2'],
            ['bus_id' => 2, 'title' => 'seat 11 of bus 2'],
            ['bus_id' => 2, 'title' => 'seat 12 of bus 2'],

            ['bus_id' => 3, 'title' => 'seat 1 of bus 3'],
            ['bus_id' => 3, 'title' => 'seat 2 of bus 3'],
            ['bus_id' => 3, 'title' => 'seat 3 of bus 3'],
            ['bus_id' => 3, 'title' => 'seat 4 of bus 3'],
            ['bus_id' => 3, 'title' => 'seat 5 of bus 3'],
            ['bus_id' => 3, 'title' => 'seat 6 of bus 3'],
            ['bus_id' => 3, 'title' => 'seat 7 of bus 3'],
            ['bus_id' => 3, 'title' => 'seat 8 of bus 3'],
            ['bus_id' => 3, 'title' => 'seat 9 of bus 3'],
            ['bus_id' => 3, 'title' => 'seat 10 of bus 3'],
            ['bus_id' => 3, 'title' => 'seat 11 of bus 3'],
            ['bus_id' => 3, 'title' => 'seat 12 of bus 3'],

        ];

        \App\Models\Seat::insert($seats);
    }
}
