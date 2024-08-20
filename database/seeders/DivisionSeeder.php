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
            'Division of Davao del Sur',
        ];

        foreach ($divisions as $division) {
            Division::create([
                'name' => $division,
                'region_id' => $regionXI->id,
            ]);
        }
    }
}
