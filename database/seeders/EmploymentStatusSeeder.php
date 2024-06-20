<?php

namespace Database\Seeders;

use App\Models\EmploymentStatus;
use Illuminate\Database\Seeder;

class EmploymentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define employment statuses
        $statuses = [
            ['name' => 'Permanent'],
            ['name' => 'Temporary'],
            ['name' => 'Contractual'],
            ['name' => 'Part-Time'],
            ['name' => 'Probationary'],
        ];

        // Insert the statuses into the database
        foreach ($statuses as $status) {
            EmploymentStatus::create($status);
        }
    }
}
