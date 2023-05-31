<?php

namespace Database\Seeders;

use App\Models\Reports;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reportNames = [
            'Incorrect Ingredients',
            'Incorrect Measurements',
            'Steps or Instructions Missing',
            'Confusing or Unclear Instructions',
            'Incorrect Cooking Time or Temperature',
            'Allergy or Dietary Restrictions',
            'Technical Issues',
        ];

        foreach ($reportNames as $name) {
            Reports::create(['name' => $name]);
        }
    }
}
