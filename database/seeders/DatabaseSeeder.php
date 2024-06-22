<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            UserSeeder::class,
            RegionSeeder::class,
            DivisionSeeder::class,
            DistrictSeeder::class,
            EmploymentStatusSeeder::class,
            PositionCategorySeeder::class,
            PositionSeeder::class,
            TrackSeeder::class,
            StrandSeeder::class,
            SpecializationSeeder::class,
            GradeSeeder::class,
        ]);
    }
}
