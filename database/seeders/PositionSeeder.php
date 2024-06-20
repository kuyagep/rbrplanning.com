<?php

namespace Database\Seeders;

use App\Models\EmploymentStatus;
use App\Models\Position;
use App\Models\PositionCategory;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fetch position categories
        $categories = PositionCategory::all()->keyBy('name');
        $statuses = EmploymentStatus::all()->keyBy('name');

        // Define positions with their categories and employment statuses
        $positions = [
            // Administrative Positions
            ['name' => 'Secretary of Education', 'category' => 'Administrative', 'status' => 'Permanent'],
            ['name' => 'Undersecretary', 'category' => 'Administrative', 'status' => 'Permanent'],
            ['name' => 'Assistant Secretary', 'category' => 'Administrative', 'status' => 'Permanent'],
            ['name' => 'Director IV', 'category' => 'Administrative', 'status' => 'Permanent'],
            ['name' => 'Director III', 'category' => 'Administrative', 'status' => 'Permanent'],
            ['name' => 'Director II', 'category' => 'Administrative', 'status' => 'Permanent'],
            ['name' => 'Director I', 'category' => 'Administrative', 'status' => 'Permanent'],
            ['name' => 'Chief of Division', 'category' => 'Administrative', 'status' => 'Permanent'],
            ['name' => 'Chief Education Supervisor', 'category' => 'Administrative', 'status' => 'Permanent'],
            ['name' => 'Education Program Supervisor', 'category' => 'Administrative', 'status' => 'Permanent'],

            // Instructional Positions
            ['name' => 'School Principal IV (Master Teacher IV)', 'category' => 'Instructional', 'status' => 'Permanent'],
            ['name' => 'School Principal III (Master Teacher III)', 'category' => 'Instructional', 'status' => 'Permanent'],
            ['name' => 'School Principal II (Master Teacher II)', 'category' => 'Instructional', 'status' => 'Permanent'],
            ['name' => 'School Principal I (Master Teacher I)', 'category' => 'Instructional', 'status' => 'Permanent'],
            ['name' => 'Teacher III', 'category' => 'Instructional', 'status' => 'Permanent'],
            ['name' => 'Teacher II', 'category' => 'Instructional', 'status' => 'Permanent'],
            ['name' => 'Teacher I', 'category' => 'Instructional', 'status' => 'Permanent'],
            ['name' => 'Education Program Specialist II', 'category' => 'Instructional', 'status' => 'Permanent'],
            ['name' => 'Education Program Specialist I', 'category' => 'Instructional', 'status' => 'Permanent'],
            ['name' => 'Guidance Counselor III', 'category' => 'Instructional', 'status' => 'Permanent'],
            ['name' => 'Guidance Counselor II', 'category' => 'Instructional', 'status' => 'Permanent'],
            ['name' => 'Guidance Counselor I', 'category' => 'Instructional', 'status' => 'Permanent'],

            // Support Positions
            ['name' => 'Administrative Officer IV', 'category' => 'Support', 'status' => 'Permanent'],
            ['name' => 'Administrative Officer III', 'category' => 'Support', 'status' => 'Permanent'],
            ['name' => 'Administrative Officer II', 'category' => 'Support', 'status' => 'Permanent'],
            ['name' => 'Administrative Officer I', 'category' => 'Support', 'status' => 'Permanent'],
            ['name' => 'Administrative Aide VI', 'category' => 'Support', 'status' => 'Permanent'],
            ['name' => 'Administrative Aide V', 'category' => 'Support', 'status' => 'Permanent'],
            ['name' => 'Administrative Aide IV', 'category' => 'Support', 'status' => 'Permanent'],
            ['name' => 'Administrative Aide III', 'category' => 'Support', 'status' => 'Permanent'],
            ['name' => 'Administrative Aide II', 'category' => 'Support', 'status' => 'Permanent'],
            ['name' => 'Administrative Aide I', 'category' => 'Support', 'status' => 'Permanent'],
            ['name' => 'Clerk IV', 'category' => 'Support', 'status' => 'Permanent'],
            ['name' => 'Clerk III', 'category' => 'Support', 'status' => 'Permanent'],
            ['name' => 'Clerk II', 'category' => 'Support', 'status' => 'Permanent'],
            ['name' => 'Clerk I', 'category' => 'Support', 'status' => 'Permanent'],

            // Specialized Positions
            ['name' => 'Budget Officer IV', 'category' => 'Specialized', 'status' => 'Permanent'],
            ['name' => 'Budget Officer III', 'category' => 'Specialized', 'status' => 'Permanent'],
            ['name' => 'Budget Officer II', 'category' => 'Specialized', 'status' => 'Permanent'],
            ['name' => 'Budget Officer I', 'category' => 'Specialized', 'status' => 'Permanent'],
            ['name' => 'Legal Officer IV', 'category' => 'Specialized', 'status' => 'Permanent'],
            ['name' => 'Legal Officer III', 'category' => 'Specialized', 'status' => 'Permanent'],
            ['name' => 'Legal Officer II', 'category' => 'Specialized', 'status' => 'Permanent'],
            ['name' => 'Legal Officer I', 'category' => 'Specialized', 'status' => 'Permanent'],
            ['name' => 'Planning Officer IV', 'category' => 'Specialized', 'status' => 'Permanent'],
            ['name' => 'Planning Officer III', 'category' => 'Specialized', 'status' => 'Permanent'],
            ['name' => 'Planning Officer II', 'category' => 'Specialized', 'status' => 'Permanent'],
            ['name' => 'Planning Officer I', 'category' => 'Specialized', 'status' => 'Permanent'],

            // Technical Positions
            ['name' => 'Engineer IV', 'category' => 'Technical', 'status' => 'Permanent'],
            ['name' => 'Engineer III', 'category' => 'Technical', 'status' => 'Permanent'],
            ['name' => 'Engineer II', 'category' => 'Technical', 'status' => 'Permanent'],
            ['name' => 'Engineer I', 'category' => 'Technical', 'status' => 'Permanent'],
            ['name' => 'Architect IV', 'category' => 'Technical', 'status' => 'Permanent'],
            ['name' => 'Architect III', 'category' => 'Technical', 'status' => 'Permanent'],
            ['name' => 'Architect II', 'category' => 'Technical', 'status' => 'Permanent'],
            ['name' => 'Architect I', 'category' => 'Technical', 'status' => 'Permanent'],
            ['name' => 'Nurse IV', 'category' => 'Technical', 'status' => 'Permanent'],
            ['name' => 'Nurse III', 'category' => 'Technical', 'status' => 'Permanent'],
            ['name' => 'Nurse II', 'category' => 'Technical', 'status' => 'Permanent'],
            ['name' => 'Nurse I', 'category' => 'Technical', 'status' => 'Permanent'],

            // Health Positions
            ['name' => 'Dentist IV', 'category' => 'Health', 'status' => 'Permanent'],
            ['name' => 'Dentist III', 'category' => 'Health', 'status' => 'Permanent'],
            ['name' => 'Dentist II', 'category' => 'Health', 'status' => 'Permanent'],
            ['name' => 'Dentist I', 'category' => 'Health', 'status' => 'Permanent'],
            ['name' => 'Medical Officer IV', 'category' => 'Health', 'status' => 'Permanent'],
            ['name' => 'Medical Officer III', 'category' => 'Health', 'status' => 'Permanent'],
            ['name' => 'Medical Officer II', 'category' => 'Health', 'status' => 'Permanent'],
            ['name' => 'Medical Officer I', 'category' => 'Health', 'status' => 'Permanent'],
        ];

        // Insert the positions into the database
        foreach ($positions as $position) {
            Position::create([
                'name' => $position['name'],
                'position_category_id' => $categories[$position['category']]->id,
                'employment_status_id' => $statuses[$position['status']]->id,
            ]);
        }
    }
}
