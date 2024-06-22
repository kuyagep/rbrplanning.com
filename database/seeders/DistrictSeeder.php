<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\Division;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $davaoDelSur = Division::where('name', 'Division of Davao del Sur')->first();

        $districts = [
            'Bansalan East',
            'Bansalan West',
            'Hagonoy I',
            'Hagonoy II',
            'Kiblawan North',
            'Kiblawan South',
            'Matanao I',
            'Matanao II',
            'Malalag',
            'Magsaysay North',
            'Magsaysay South',
            'Padada',
            'Santa Cruz North',
            'Santa Cruz South',
            'Sulop',
        ];

        foreach ($districts as $district) {
            District::create([
                'name' => $district,
                'division_id' => $davaoDelSur->id,
            ]);
        }
    }
}
