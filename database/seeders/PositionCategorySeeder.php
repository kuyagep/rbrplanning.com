<?php

namespace Database\Seeders;

use App\Models\PositionCategory;
use Illuminate\Database\Seeder;

class PositionCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define position categories
        $categories = [
            ['name' => 'Administrative'],
            ['name' => 'Instructional'],
            ['name' => 'Support'],
            ['name' => 'Specialized'],
            ['name' => 'Technical'],
            ['name' => 'Health'],
        ];

        // Insert the categories into the database
        foreach ($categories as $category) {
            PositionCategory::create($category);
        }
    }
}
