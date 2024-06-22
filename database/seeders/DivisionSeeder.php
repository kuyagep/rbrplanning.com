<?php

namespace Database\Seeders;

use App\Models\Division;
use App\Models\Region;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $regionXI = Region::where('name', 'Region XI (Davao Region)')->first();

        $divisions = [
            'Division of Davao City',
            'Division of Davao del Norte',
            'Division of Davao del Sur',
            'Division of Davao Oriental',
            'Division of Davao Occidental',
            'Division of IGACOS (Island Garden City of Samal)',
            'Division of Tagum',
            'Division of Mati',
        ];

        foreach ($divisions as $division) {
            Division::create([
                'name' => $division,
                'region_id' => $regionXI->id,
            ]);
        }
    }
}
