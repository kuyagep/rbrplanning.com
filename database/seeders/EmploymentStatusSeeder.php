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
        $statuses = [
            ['name' => 'Permanent Employee'],
            ['name' => 'Temporary Employee'],
            ['name' => 'Contractual Employee'],
            ['name' => 'Part-Time Employee'],
            ['name' => 'Intern'],
            ['name' => 'Political Appointee'],
            ['name' => 'Seasonal Employee'],
            ['name' => 'Probationary Employee'],
        ];

        foreach ($statuses as $status) {
            EmploymentStatus::create($status);
        }
    }
}
