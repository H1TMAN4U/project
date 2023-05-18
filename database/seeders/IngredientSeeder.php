<?php

namespace Database\Seeders;

use App\Models\Ingredients;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $date = now();

        DB::table('ingredients')->truncate();

        $ing = [
            'Olive oil'
        ];

        foreach ($ing as $i) {
            $item = new Ingredients();
            $item->name = $i;
            $item->save();
        }

        // DB::table('ingredients')->insert([
        //     ['name' => 'Olive oil', 'created_at' => $date, 'updated_at' => $date],
        //     ['name' => 'Onion', 'created_at' => $date, 'updated_at' => $date],
        //     ['name' => 'Garlic cloves', 'created_at' => $date, 'updated_at' => $date],
        //     ['name' => 'Chorizo', 'created_at' => $date, 'updated_at' => $date],
        //     ['name' => 'Tomatoes', 'created_at' => $date, 'updated_at' => $date],
        //     ['name' => 'Caster sugar', 'created_at' => $date, 'updated_at' => $date],
        //     ['name' => 'Fresh gnocchi', 'created_at' => $date, 'updated_at' => $date],
        //     ['name' => 'Mozzarella ball', 'created_at' => $date, 'updated_at' => $date],
        //     ['name' => 'Basil', 'created_at' => $date, 'updated_at' => $date],
        //     ['name' => 'Green salad', 'created_at' => $date, 'updated_at' => $date],
        //     ['name' => 'Self-raising flour', 'created_at' => $date, 'updated_at' => $date],
        //     ['name' => 'Baking powder', 'created_at' => $date, 'updated_at' => $date],
        //     ['name' => 'Golden caster sugar', 'created_at' => $date, 'updated_at' => $date],
        //     ['name' => 'Large eggs', 'created_at' => $date, 'updated_at' => $date],
        //     ['name' => 'Melted butter', 'created_at' => $date, 'updated_at' => $date],
        //     ['name' => 'Milk', 'created_at' => $date, 'updated_at' => $date],
        //     ['name' => 'Vegetable oil', 'created_at' => $date, 'updated_at' => $date],
        // ]);
    }
}
