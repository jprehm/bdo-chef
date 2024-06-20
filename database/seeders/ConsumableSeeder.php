<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\User;
use App\Services\UserInventorySeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use stdClass;

class ConsumableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->getData()->each(function (stdClass $item) {
            $recipe = Recipe::where('name', $item->name)->sole();

            $item->ingredients->each(
                fn (stdClass $ingredient) => $recipe->ingredients()->attach(
                    Ingredient::where('name', $ingredient->name)->sole()->id,
                    ['count' => $ingredient->count]
                )
            );
        });

        (new UserInventorySeeder(User::first()))->run();
    }

    public function getData(): Collection
    {
        return collect([
            (object) [
                'name' => 'Date Palm Wine',
                'ingredients' => collect([
                    (object) ['name' => 'Essence of Liquor', 'count' => 2],
                    (object) ['name' => 'Leaving Agent', 'count' => 4],
                    (object) ['name' => 'Sugar', 'count' => 1],
                    (object) ['name' => 'Date Palm', 'count' => 5],
                ]),
            ], (object) [
                'name' => 'Essence of Liquor',
                'ingredients' => collect([
                    (object) ['name' => 'Corn Flour', 'count' => 1],
                    (object) ['name' => 'Strawberry', 'count' => 1],
                    (object) ['name' => 'Leaving Agent', 'count' => 1],
                ]),
            ], (object) [
                'name' => 'Corn Flour',
                'ingredients' => collect([
                    (object) ['name' => 'Corn', 'count' => 1],
                ]),
            ], (object) [
                'name' => 'Corn Dough',
                'ingredients' => collect([
                    (object) ['name' => 'Corn Flour', 'count' => 1],
                    (object) ['name' => 'Mineral Water', 'count' => 1],
                ]),
            ], (object) [
                'name' => 'Fig Pie',
                'ingredients' => collect([
                    (object) ['name' => 'Fig', 'count' => 5],
                    (object) ['name' => 'Corn Dough', 'count' => 2],
                    (object) ['name' => 'Sugar', 'count' => 3],
                    (object) ['name' => 'Olive Oil', 'count' => 2],
                ]),
            ], (object) [
                'name' => 'Vinegar',
                'ingredients' => collect([
                    (object) ['name' => 'Wheat', 'count' => 1],
                    (object) ['name' => 'Strawberry', 'count' => 1],
                    (object) ['name' => 'Leaving Agent', 'count' => 1],
                    (object) ['name' => 'Sugar', 'count' => 1],
                ]),
            ], (object) [
                'name' => 'Pickled Vegetables',
                'ingredients' => collect([
                    (object) ['name' => 'Paprika', 'count' => 8],
                    (object) ['name' => 'Vinegar', 'count' => 4],
                    (object) ['name' => 'Leaving Agent', 'count' => 2],
                    (object) ['name' => 'Sugar', 'count' => 2],
                ]),
            ], (object) [
                'name' => 'Teff Bread',
                'ingredients' => collect([
                    (object) ['name' => 'Teff Flour', 'count' => 5],
                    (object) ['name' => 'Mineral Water', 'count' => 3],
                    (object) ['name' => 'Leaving Agent', 'count' => 2],
                    (object) ['name' => 'Salt', 'count' => 2],
                ]),
            ], (object) [
                'name' => 'King of Jungle Hamburg',
                'ingredients' => collect([
                    (object) ['name' => 'Lion Meat', 'count' => 4],
                    (object) ['name' => 'Teff Bread', 'count' => 4],
                    (object) ['name' => 'Pickled Vegetables', 'count' => 2],
                    (object) ['name' => 'Nutmeg', 'count' => 3],
                ]),
            ], (object) [
                'name' => 'Red Sauce',
                'ingredients' => collect([
                    (object) ['name' => 'Deer Meat', 'count' => 1],
                    (object) ['name' => 'Base Sauce', 'count' => 1],
                    (object) ['name' => 'Mineral Water', 'count' => 2],
                    (object) ['name' => 'Sugar', 'count' => 2],
                ]),
            ], (object) [
                'name' => 'Cream',
                'ingredients' => collect([
                    (object) ['name' => 'Milk', 'count' => 1],
                    (object) ['name' => 'Sugar', 'count' => 1],
                ]),
            ], (object) [
                'name' => 'Butter',
                'ingredients' => collect([
                    (object) ['name' => 'Cream', 'count' => 1],
                    (object) ['name' => 'Salt', 'count' => 1],
                ]),
            ], (object) [
                'name' => 'Grilled Scorpion',
                'ingredients' => collect([
                    (object) ['name' => 'Scorpion Meat', 'count' => 3],
                    (object) ['name' => 'Butter', 'count' => 2],
                    (object) ['name' => 'Nutmeg', 'count' => 3],
                    (object) ['name' => 'Special Hot Pepper', 'count' => 1],
                ]),
            ], (object) [
                'name' => 'Freekeh Snake Stew',
                'ingredients' => collect([
                    (object) ['name' => 'Snake Meat', 'count' => 3],
                    (object) ['name' => 'Freekeh', 'count' => 6],
                    (object) ['name' => 'Star Anise', 'count' => 2],
                    (object) ['name' => 'Mineral Water', 'count' => 5],
                ]),
            ], (object) [
                'name' => 'Teff Sandwich',
                'ingredients' => collect([
                    (object) ['name' => 'Freekeh Snake Stew', 'count' => 1],
                    (object) ['name' => 'Grilled Scorpion', 'count' => 1],
                    (object) ['name' => 'Teff Bread', 'count' => 1],
                    (object) ['name' => 'Red Sauce', 'count' => 3],
                ]),
            ], (object) [
                'name' => 'Teff Flour',
                'ingredients' => collect([
                    (object) ['name' => 'Teff', 'count' => 1],
                ]),
            ], (object) [
                'name' => 'Teff Flour Dough',
                'ingredients' => collect([
                    (object) ['name' => 'Teff Flour', 'count' => 1],
                    (object) ['name' => 'Mineral Water', 'count' => 1],
                ]),
            ], (object) [
                'name' => 'Couscous',
                'ingredients' => collect([
                    (object) ['name' => 'Freekeh Snake Stew', 'count' => 1],
                    (object) ['name' => 'Teff Flour Dough', 'count' => 6],
                    (object) ['name' => 'Nutmeg', 'count' => 3],
                    (object) ['name' => 'Paprika', 'count' => 4],
                ]),
            ], (object) [
                'name' => 'Valencia Meal',
                'ingredients' => collect([
                    (object) ['name' => 'Couscous', 'count' => 1],
                    (object) ['name' => 'Teff Sandwich', 'count' => 1],
                    (object) ['name' => 'King of Jungle Hamburg', 'count' => 1],
                    (object) ['name' => 'Fig Pie', 'count' => 2],
                    (object) ['name' => 'Date Palm Wine', 'count' => 2],
                ]),
            ], (object) [
                'name' => "Guru's Cooking Box",
                'ingredients' => collect([
                    (object) ['name' => 'Valencia Meal', 'count' => 18],
                ]),
            ], (object) [
                'name' => "Special Guru's Cooking Box",
                'ingredients' => collect([
                    (object) ['name' => 'Special Valencia Meal', 'count' => 6],
                ]),
            ],

        ]);
    }
}
