<?php

namespace Database\Seeders;

use App\Models\Zone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ZoneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Zone::insert([
            ['zone_name' => 'Zone 1'],
            ['zone_name' => 'Zone 2'],
            ['zone_name' => 'Zone 3'],
            ['zone_name' => 'Zone 4'],
            ['zone_name' => 'Zone 5'],
            ['zone_name' => 'Zone 6'],
            ['zone_name' => 'Zone 7'],
        ]);
    }
}
