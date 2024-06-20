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
        $grades = [
            ['name' => 'Kindergarten', 'grade_level' => 'Early Childhood'],
            ['name' => 'Grade 1', 'grade_level' => 'Elementary'],
            ['name' => 'Grade 2', 'grade_level' => 'Elementary'],
            ['name' => 'Grade 3', 'grade_level' => 'Elementary'],
            ['name' => 'Grade 4', 'grade_level' => 'Elementary'],
            ['name' => 'Grade 5', 'grade_level' => 'Elementary'],
            ['name' => 'Grade 6', 'grade_level' => 'Elementary'],
            ['name' => 'Grade 7', 'grade_level' => 'Junior High School'],
            ['name' => 'Grade 8', 'grade_level' => 'Junior High School'],
            ['name' => 'Grade 9', 'grade_level' => 'Junior High School'],
            ['name' => 'Grade 10', 'grade_level' => 'Junior High School'],
            ['name' => 'Grade 11', 'grade_level' => 'Senior High School'],
            ['name' => 'Grade 12', 'grade_level' => 'Senior High School'],
        ];

        // Insert data into the database
        foreach ($grades as $grade) {
            Grade::create($grade);
        }
    }
}
