<?php

namespace Database\Seeders;

use App\Models\Strand;
use App\Models\Track;
use Illuminate\Database\Seeder;

class StrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fetch the Track IDs
        $academicTrackId = Track::where('name', 'Academic Track')->first()->id;
        $tvlTrackId = Track::where('name', 'Technical-Vocational-Livelihood (TVL) Track')->first()->id;
        $sportsTrackId = Track::where('name', 'Sports Track')->first()->id;
        $artsAndDesignTrackId = Track::where('name', 'Arts and Design Track')->first()->id;

        // Define the strands with their corresponding track IDs
        $strands = [
            ['track_id' => $academicTrackId, 'name' => 'Accountancy, Business, and Management (ABM)'],
            ['track_id' => $academicTrackId, 'name' => 'Science, Technology, Engineering, and Mathematics (STEM)'],
            ['track_id' => $academicTrackId, 'name' => 'Humanities and Social Sciences (HUMSS)'],
            ['track_id' => $academicTrackId, 'name' => 'General Academic Strand (GAS)'],
            ['track_id' => $tvlTrackId, 'name' => 'Home Economics (HE)'],
            ['track_id' => $tvlTrackId, 'name' => 'Information and Communications Technology (ICT)'],
            ['track_id' => $tvlTrackId, 'name' => 'Industrial Arts (IA)'],
            ['track_id' => $tvlTrackId, 'name' => 'Agri-Fishery Arts (AFA)'],
            ['track_id' => $sportsTrackId, 'name' => 'Sports Track'],
            ['track_id' => $artsAndDesignTrackId, 'name' => 'Arts and Design Track'],
        ];

        // Create the strands in the database
        foreach ($strands as $strand) {
            Strand::create($strand);
        }
    }
}
