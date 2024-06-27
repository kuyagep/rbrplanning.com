<?php

namespace Database\Seeders;

use App\Models\SpecialPrograms;
use Illuminate\Database\Seeder;

class SpecialProgramsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define funding_sources
        $special_programs = [
            ['name' => 'Special Program in the Arts'],
            ['name' => 'Special Program in Foreign Language'],
            ['name' => 'Special Program in Journalism'],
            ['name' => 'Special Program in Science, Technology and Engineering'],
            ['name' => 'Special Program in Sports'],
            ['name' => 'Special Program in Technical Vocation Education'],
        ];

        // Insert the special_programs into the database
        foreach ($special_programs as $data) {
            SpecialPrograms::create($data);
        }
    }
}
