<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define sample grade levels from Nursery to Grade 12
        $grades = [
            ['name' => 'Nursery'],
            ['name' => 'Kindergarten'],
            ['name' => 'Grade 1'],
            ['name' => 'Grade 2'],
            ['name' => 'Grade 3'],
            ['name' => 'Grade 4'],
            ['name' => 'Grade 5'],
            ['name' => 'Grade 6'],
            ['name' => 'Grade 7'],
            ['name' => 'Grade 8'],
            ['name' => 'Grade 9'],
            ['name' => 'Grade 10'],
            ['name' => 'Grade 11'],
            ['name' => 'Grade 12'],
        ];

        // Insert the grade levels into the database
        foreach ($grades as $grade) {
            Grade::create($grade);
        }
    }
}
