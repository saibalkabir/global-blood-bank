<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = [
            ['area' => 'Downtown', 'city' => 'New York', 'state' => 'NY', 'country' => 'USA', 'postal_code' => '10001'],
            ['area' => 'Midtown', 'city' => 'New York', 'state' => 'NY', 'country' => 'USA', 'postal_code' => '10018'],
            ['area' => 'Chinatown', 'city' => 'San Francisco', 'state' => 'CA', 'country' => 'USA', 'postal_code' => '94108'],
            ['area' => 'Hollywood', 'city' => 'Los Angeles', 'state' => 'CA', 'country' => 'USA', 'postal_code' => '90028'],
            ['area' => 'Bayside', 'city' => 'Miami', 'state' => 'FL', 'country' => 'USA', 'postal_code' => '33132'],
            ['area' => 'Silicon Valley', 'city' => 'San Jose', 'state' => 'CA', 'country' => 'USA', 'postal_code' => '95129'],
            ['area' => 'Central London', 'city' => 'London', 'state' => null, 'country' => 'UK', 'postal_code' => 'EC1A'],
            ['area' => 'Downtown', 'city' => 'Toronto', 'state' => 'ON', 'country' => 'Canada', 'postal_code' => 'M5H'],
            ['area' => 'CBD', 'city' => 'Sydney', 'state' => 'NSW', 'country' => 'Australia', 'postal_code' => '2000'],
            ['area' => 'Central', 'city' => 'Hong Kong', 'state' => null, 'country' => 'Hong Kong', 'postal_code' => '999077'],
        ];

        \DB::table('locations')->insert($locations);
    }
}
