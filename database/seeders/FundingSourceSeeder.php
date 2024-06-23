<?php

namespace Database\Seeders;

use App\Models\FundingSource;
use Illuminate\Database\Seeder;

class FundingSourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define funding_sources
        $funding_sources = [
            ['fund_source' => 'Provincial'],
            ['fund_source' => 'Municipal'],
            ['fund_source' => 'LGU Funded'],
            ['fund_source' => 'Others'],
            ['fund_source' => 'Technical'],
            ['fund_source' => 'Health'],
        ];

        // Insert the funding_sources into the database
        foreach ($funding_sources as $funding_source) {
            FundingSource::create($funding_source);
        }
    }
}
