<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Measure;

class MeasureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $measures = [
            ['name' => 'Grams (g)'],
            ['name' => 'Kilograms (kg)'],
            ['name' => 'Milligrams (mg)'],
            ['name' => 'Milliliters (ml)'],
            ['name' => 'Liters (l)'],
            ['name' => 'Teaspoons (tsp)'],
            ['name' => 'Tablespoons (tbsp)'],
        ];

        foreach ($measures as $measure) {
            Measure::create($measure);
        }
    }
}
