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
            'Region XI (Davao Region)',
        ];

        foreach ($regions as $region) {
            Region::create(['name' => $region]);
        }
    }
}
