<?php

namespace Database\Seeders;

use App\Models\Specialization;
use App\Models\Strand;
use Illuminate\Database\Seeder;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define the specializations with their corresponding strand names
        $specializations = [
            // Home Economics (HE)
            ['strand' => 'Home Economics (HE)', 'name' => 'Cookery'],
            ['strand' => 'Home Economics (HE)', 'name' => 'Bread and Pastry Production'],
            ['strand' => 'Home Economics (HE)', 'name' => 'Housekeeping'],
            ['strand' => 'Home Economics (HE)', 'name' => 'Food and Beverage Services'],
            ['strand' => 'Home Economics (HE)', 'name' => 'Tourism Promotion Services'],
            ['strand' => 'Home Economics (HE)', 'name' => 'Caregiving'],
            ['strand' => 'Home Economics (HE)', 'name' => 'Dressmaking/Tailoring'],
            ['strand' => 'Home Economics (HE)', 'name' => 'Barbering'],
            ['strand' => 'Home Economics (HE)', 'name' => 'Beauty/Nail Care'],

            // Information and Communications Technology (ICT)
            ['strand' => 'Information and Communications Technology (ICT)', 'name' => 'Computer Programming'],
            ['strand' => 'Information and Communications Technology (ICT)', 'name' => 'Animation'],
            ['strand' => 'Information and Communications Technology (ICT)', 'name' => 'Web Development'],
            ['strand' => 'Information and Communications Technology (ICT)', 'name' => 'Computer System Servicing'],

            // Industrial Arts (IA)
            ['strand' => 'Industrial Arts (IA)', 'name' => 'Electrical Installation and Maintenance'],
            ['strand' => 'Industrial Arts (IA)', 'name' => 'Shielded Metal Arc Welding'],
            ['strand' => 'Industrial Arts (IA)', 'name' => 'Plumbing'],
            ['strand' => 'Industrial Arts (IA)', 'name' => 'Carpentry'],
            ['strand' => 'Industrial Arts (IA)', 'name' => 'Automotive Servicing'],

            // Agri-Fishery Arts (AFA)
            ['strand' => 'Agri-Fishery Arts (AFA)', 'name' => 'Agricultural Crop Production'],
            ['strand' => 'Agri-Fishery Arts (AFA)', 'name' => 'Animal Production'],
            ['strand' => 'Agri-Fishery Arts (AFA)', 'name' => 'Fish Processing'],
            ['strand' => 'Agri-Fishery Arts (AFA)', 'name' => 'Fisheries'],

            // Sports Track
            ['strand' => 'Sports Track', 'name' => 'Physical Education'],
            ['strand' => 'Sports Track', 'name' => 'Fitness Training'],
            ['strand' => 'Sports Track', 'name' => 'Sports Officiating'],
            ['strand' => 'Sports Track', 'name' => 'Recreation Management'],

            // Arts and Design Track
            ['strand' => 'Arts and Design Track', 'name' => 'Visual Arts'],
            ['strand' => 'Arts and Design Track', 'name' => 'Performing Arts (Dance, Music, Theater)'],
            ['strand' => 'Arts and Design Track', 'name' => 'Media Arts'],
            ['strand' => 'Arts and Design Track', 'name' => 'Literary Arts'],
            ['strand' => 'Arts and Design Track', 'name' => 'Industrial Arts'],
        ];

        // Create the specializations in the database
        foreach ($specializations as $specialization) {
            $strand = Strand::where('name', $specialization['strand'])->first();
            if ($strand) {
                Specialization::create([
                    'strand_id' => $strand->id,
                    'name' => $specialization['name'],
                ]);
            }
        }
    }
}
