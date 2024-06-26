<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $regions = [
            'National Capital Region (NCR)',
            'Cordillera Administrative Region (CAR)',
            'Region I (Ilocos Region)',
            'Region II (Cagayan Valley)',
            'Region III (Central Luzon)',
            'Region IV-A (CALABARZON)',
            'Region IV-B (MIMAROPA)',
            'Region V (Bicol Region)',
            'Region VI (Western Visayas)',
            'Region VII (Central Visayas)',
            'Region VIII (Eastern Visayas)',
            'Region IX (Zamboanga Peninsula)',
            'Region X (Northern Mindanao)',
            'Region XI (Davao Region)',
            'Region XII (SOCCSKSARGEN)',
            'Region XIII (Caraga)',
            'Bangsamoro Autonomous Region in Muslim Mindanao (BARMM)',
        ];

        foreach ($regions as $region) {
            Region::create(['name' => $region]);
        }

    }
}
