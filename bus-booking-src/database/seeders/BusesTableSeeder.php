<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $buses = [
            ['name' => 'Bus number 1', 'seats_count' => 12],
            ['name' => 'Bus number 2', 'seats_count' => 12],
            ['name' => 'Bus number 3', 'seats_count' => 12],
        ];

        \App\Models\Bus::insert($buses);
    }
}
