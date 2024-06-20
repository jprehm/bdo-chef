<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('recipes')->insert($this->getData());
    }

    public function getData(): array
    {
        return [
            [
                'name' => 'Date Palm Wine',
                'weight' => 0.10,
                'type' => 'cooking',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Essence of Liquor',
                'weight' => 0.01,
                'type' => 'cooking',
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
                'name' => 'Pickled Vegetables',
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
                'name' => 'Grilled Scorpion',
                'weight' => 0.00,
                'type' => 'cooking',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Teff Bread',
                'weight' => 0.00,
                'type' => 'cooking',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => 'Vinegar',
                'weight' => 0.00,
                'type' => 'cooking',
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
                'name' => 'Red Sauce',
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
                'name' => "Guru's Cooking Box",
                'weight' => 0.00,
                'type' => 'processing',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => "Special Guru's Cooking Box",
                'weight' => 0.00,
                'type' => 'processing',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
    }
}
