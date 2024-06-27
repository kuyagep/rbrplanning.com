<?php

namespace Database\Seeders;

use App\Models\SchoolYear;
use Illuminate\Database\Seeder;

class SchoolYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define position categories
        $school_years = [
            ['school_year' => '2020-2021'],
            ['school_year' => '2021-2022'],
            ['school_year' => '2022-2023'],
            ['school_year' => '2023-2024'],
            ['school_year' => '2024-2025'],
        ];

        // Insert the school_years into the database
        foreach ($school_years as $school_year) {
            SchoolYear::create($school_year);
        }
    }
}
