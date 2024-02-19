<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ingredients')->insert($this->getData());
    }

    public function getData(): array
    {
        return [
            [
                'name' => 'Essence of Liquor',
                'weight' => 0.01,
                'type' => 'cooking',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Leaving Agent',
                'weight' => 0.01,
                'type' => 'vendor',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Sugar',
                'weight' => 0.01,
                'type' => 'vendor',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Date Palm',
                'weight' => 0.10,
                'type' => 'worker',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Corn Flour',
                'weight' => 0.00,
                'type' => 'processing',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Corn Dough',
                'weight' => 0.00,
                'type' => 'processing',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Strawberry',
                'weight' => 0.00,
                'type' => 'vendor',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Olive Oil',
                'weight' => 0.00,
                'type' => 'vendor',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Courn Dough',
                'weight' => 0.00,
                'type' => 'processing',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Mineral Water',
                'weight' => 0.00,
                'type' => 'vendor',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Fig',
                'weight' => 0.00,
                'type' => 'worker',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Nutmeg',
                'weight' => 0.00,
                'type' => 'worker',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Corn',
                'weight' => 0.00,
                'type' => 'worker',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Wheat',
                'weight' => 0.00,
                'type' => 'worker',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Barley',
                'weight' => 0.00,
                'type' => 'worker',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Potato',
                'weight' => 0.00,
                'type' => 'worker',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Sweet Potato',
                'weight' => 0.00,
                'type' => 'worker',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Vinegar',
                'weight' => 0.00,
                'type' => 'cooking',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Pumpkin',
                'weight' => 0.00,
                'type' => 'worker',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Paprika',
                'weight' => 0.00,
                'type' => 'vendor',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Salt',
                'weight' => 0.00,
                'type' => 'vendor',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Teff',
                'weight' => 0.00,
                'type' => 'worker',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Teff Flour',
                'weight' => 0.00,
                'type' => 'processing',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Teff Flour Dough',
                'weight' => 0.00,
                'type' => 'processing',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Teff Bread',
                'weight' => 0.00,
                'type' => 'cooking',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Lion Meat',
                'weight' => 0.00,
                'type' => 'gathering',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Deer Meat',
                'weight' => 0.00,
                'type' => 'gathering',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Red Sauce',
                'weight' => 0.00,
                'type' => 'cooking',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Base Sauce',
                'weight' => 0.00,
                'type' => 'vendor',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Special Hot Pepper',
                'weight' => 0.00,
                'type' => 'farming',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Hot Pepper',
                'weight' => 0.00,
                'type' => 'farming',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Milk',
                'weight' => 0.00,
                'type' => 'gathering',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Cream',
                'weight' => 0.00,
                'type' => 'processing',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Butter',
                'weight' => 0.00,
                'type' => 'processing',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Scorpion Meat',
                'weight' => 0.00,
                'type' => 'gathering',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Grilled Scorpion',
                'weight' => 0.00,
                'type' => 'cooking',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Star Anise',
                'weight' => 0.00,
                'type' => 'worker',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Freekeh',
                'weight' => 0.00,
                'type' => 'worker',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Snake Meat',
                'weight' => 0.00,
                'type' => 'gathering',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Freekeh Snake Stew',
                'weight' => 0.00,
                'type' => 'cooking',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Teff Sandwich',
                'weight' => 0.00,
                'type' => 'cooking',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Couscous',
                'weight' => 0.00,
                'type' => 'cooking',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'King of Jungle Hamburg',
                'weight' => 0.00,
                'type' => 'cooking',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Picked Vegetables',
                'weight' => 0.00,
                'type' => 'cooking',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Fig Pie',
                'weight' => 0.00,
                'type' => 'cooking',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Date Palm Wine',
                'weight' => 0.00,
                'type' => 'cooking',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Valencia Meal',
                'weight' => 0.00,
                'type' => 'cooking',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Special Valencia Meal',
                'weight' => 0.00,
                'type' => 'cooking',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
    }
}
