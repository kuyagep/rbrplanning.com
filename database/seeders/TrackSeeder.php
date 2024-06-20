<?php

namespace Database\Seeders;

use App\Models\Track;
use Illuminate\Database\Seeder;

class TrackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tracks = [
            ['name' => 'Academic Track'],
            ['name' => 'Technical-Vocational-Livelihood (TVL) Track'],
            ['name' => 'Sports Track'],
            ['name' => 'Arts and Design Track'],
        ];

        foreach ($tracks as $track) {
            Track::create($track);
        }
    }
}
