<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $CategoryNames = [
            'dinners',
            'lunches',
            'breakfast',
            'dessert',
            'snacks and appetizers',
            'drinks',
            'holidays and seasons',
        ];

        foreach ($CategoryNames as $name) {
            Category::create(['name' => $name]);
        }
    }
}
