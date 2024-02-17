<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\User;
use Exception;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use stdClass;

class ConsumableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->getData()->each(function (stdClass $item) {
            try {
                $recipe = Recipe::where('name', $item->name)->sole();
            } catch (Exception $e) {
                dd($item->name);
            }

            $item->ingredients->each(
                function (stdClass $ingredient) use ($recipe) {
                    try {
                        $recipe->ingredients()->attach(
                            Ingredient::where('name', $ingredient->name)->sole()->id,
                            ['count' => $ingredient->count]
                        );
                    } catch (Exception $e) {
                        dd($ingredient->name);
                    }
                }
            );

            // $item->ingredients->each(
            //     fn (stdClass $ingredient) =>
            //     $recipe->ingredients()->attach(
            //         Ingredient::where('name', $ingredient->name)->sole()->id,
            //         ['count' => $ingredient->count]
            //     )
            // );
        });

        $this->getInventory()->each(function ($item) {

            $item->ingredients->each(
                function (stdClass $ingredient) use ($item) {
                    try {
                        $item->user->ingredients()->attach(
                            Ingredient::where('name', $ingredient->name)->sole()->id,
                            ['count' => $ingredient->count]
                        );
                    } catch (Exception $e) {
                        dd($ingredient->name);
                    }
                }
            );


            // $item->ingredients->each(
            //     fn (stdClass $ingredient) =>
            //     $item->user->ingredients()->attach(
            //         Ingredient::where('name', $ingredient->name)->sole()->id,
            //         ['count' => $ingredient->count]
            //     )
            // );
        });
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
                ])
            ], (object) [
                'name' => 'Essence of Liquor',
                'ingredients' => collect([
                    (object) ['name' => 'Corn Flour', 'count' => 1],
                    (object) ['name' => 'Strawberry', 'count' => 1],
                    (object) ['name' => 'Leaving Agent', 'count' => 1],
                ])
            ], (object) [
                'name' => 'Corn Flour',
                'ingredients' => collect([
                    (object) ['name' => 'Corn', 'count' => 1],
                ])
            ], (object) [
                'name' => 'Corn Dough',
                'ingredients' => collect([
                    (object) ['name' => 'Corn Flour', 'count' => 1],
                    (object) ['name' => 'Mineral Water', 'count' => 1],
                ])
            ], (object) [
                'name' => 'Fig Pie',
                'ingredients' => collect([
                    (object) ['name' => 'Fig', 'count' => 5],
                    (object) ['name' => 'Corn Dough', 'count' => 2],
                    (object) ['name' => 'Sugar', 'count' => 3],
                    (object) ['name' => 'Olive Oil', 'count' => 2],
                ])
            ], (object) [
                'name' => 'Vinegar',
                'ingredients' => collect([
                    (object) ['name' => 'Wheat', 'count' => 1],
                    (object) ['name' => 'Strawberry', 'count' => 1],
                    (object) ['name' => 'Leaving Agent', 'count' => 1],
                    (object) ['name' => 'Sugar', 'count' => 1],
                ])
            ], (object) [
                'name' => 'Picked Vegetables',
                'ingredients' => collect([
                    (object) ['name' => 'Paprika', 'count' => 8],
                    (object) ['name' => 'Vinegar', 'count' => 4],
                    (object) ['name' => 'Leaving Agent', 'count' => 2],
                    (object) ['name' => 'Sugar', 'count' => 2],
                ])
            ], (object) [
                'name' => 'Teff Bread',
                'ingredients' => collect([
                    (object) ['name' => 'Teff Flour', 'count' => 5],
                    (object) ['name' => 'Mineral Water', 'count' => 3],
                    (object) ['name' => 'Leaving Agent', 'count' => 2],
                    (object) ['name' => 'Salt', 'count' => 2],
                ])
            ], (object) [
                'name' => 'King of Jungle Hamburg',
                'ingredients' => collect([
                    (object) ['name' => 'Lion Meat', 'count' => 4],
                    (object) ['name' => 'Teff Bread', 'count' => 4],
                    (object) ['name' => 'Picked Vegetables', 'count' => 2],
                    (object) ['name' => 'Nutmeg', 'count' => 3],
                ])
            ], (object) [
                'name' => 'Red Sauce',
                'ingredients' => collect([
                    (object) ['name' => 'Deer Meat', 'count' => 1],
                    (object) ['name' => 'Base Sauce', 'count' => 1],
                    (object) ['name' => 'Mineral Water', 'count' => 2],
                    (object) ['name' => 'Sugar', 'count' => 2],
                ])
            ], (object) [
                'name' => 'Cream',
                'ingredients' => collect([
                    (object) ['name' => 'Milk', 'count' => 1],
                    (object) ['name' => 'Sugar', 'count' => 1],
                ])
            ], (object) [
                'name' => 'Butter',
                'ingredients' => collect([
                    (object) ['name' => 'Cream', 'count' => 1],
                    (object) ['name' => 'Salt', 'count' => 1],
                ])
            ], (object) [
                'name' => 'Grilled Scorpion',
                'ingredients' => collect([
                    (object) ['name' => 'Scorpion Meat', 'count' => 3],
                    (object) ['name' => 'Butter', 'count' => 2],
                    (object) ['name' => 'Nutmeg', 'count' => 3],
                    (object) ['name' => 'Special Hot Pepper', 'count' => 1],
                ])
            ], (object) [
                'name' => 'Freekeh Snake Stew',
                'ingredients' => collect([
                    (object) ['name' => 'Snake Meat', 'count' => 3],
                    (object) ['name' => 'Freekeh', 'count' => 6],
                    (object) ['name' => 'Star Anise', 'count' => 2],
                    (object) ['name' => 'Mineral Water', 'count' => 5],
                ])
            ], (object) [
                'name' => 'Teff Sandwich',
                'ingredients' => collect([
                    (object) ['name' => 'Freekeh Snake Stew', 'count' => 1],
                    (object) ['name' => 'Grilled Scorpion', 'count' => 1],
                    (object) ['name' => 'Teff Bread', 'count' => 1],
                    (object) ['name' => 'Red Sauce', 'count' => 3],
                ])
            ], (object) [
                'name' => 'Teff Flour Dough',
                'ingredients' => collect([
                    (object) ['name' => 'Teff Flour', 'count' => 1],
                    (object) ['name' => 'Mineral Water', 'count' => 1],
                ])
            ], (object) [
                'name' => 'Couscous',
                'ingredients' => collect([
                    (object) ['name' => 'Freekeh Snake Stew', 'count' => 1],
                    (object) ['name' => 'Teff Flour Dough', 'count' => 6],
                    (object) ['name' => 'Nutmeg', 'count' => 3],
                    (object) ['name' => 'Paprika', 'count' => 4],
                ])
            ], (object) [
                'name' => 'Valencia Meal',
                'ingredients' => collect([
                    (object) ['name' => 'Couscous', 'count' => 1],
                    (object) ['name' => 'Teff Sandwich', 'count' => 1],
                    (object) ['name' => 'King of Jungle Hamburg', 'count' => 1],
                    (object) ['name' => 'Fig Pie', 'count' => 2],
                    (object) ['name' => 'Date Palm Wine', 'count' => 2],
                ])
            ], (object) [
                'name' => "Guru's Cooking Box",
                'ingredients' => collect([
                    (object) ['name' => 'Valencia Meal', 'count' => 18],
                ])
            ], (object) [
                'name' => "Special Guru's Cooking Box",
                'ingredients' => collect([
                    (object) ['name' => 'Special Valencia Meal', 'count' => 6],
                ])
            ]


        ]);
    }

    public function getInventory(): Collection
    {
        return collect([
            (object) [
                'user' => User::first(),
                'ingredients' => collect([
                    (object) ['name' => 'Corn Dough', 'count' => 0],
                    (object) ['name' => 'Corn Flour', 'count' => 32505 + 17338],
                    (object) ['name' => 'Fig', 'count' => 153678], //worker
                    (object) ['name' => 'Teff', 'count' => 210864 + 114761 + 40000], //worker
                    (object) ['name' => 'Olive Oil', 'count' => 0],
                    (object) ['name' => 'Corn', 'count' => 47145 + 72451], //worker
                    (object) ['name' => 'Wheat', 'count' => 366627], //worker
                    (object) ['name' => 'Strawberry', 'count' => 0],
                    (object) ['name' => 'Vinegar', 'count' => 280972],
                    (object) ['name' => 'Lion Meat', 'count' => 9834],
                    (object) ['name' => 'Picked Vegetables', 'count' => 50871],
                    (object) ['name' => 'Deer Meat', 'count' => 24290],
                    (object) ['name' => 'Base Sauce', 'count' => 0],
                    (object) ['name' => 'Milk', 'count' => 150],
                    (object) ['name' => 'Cream', 'count' => 0],
                    (object) ['name' => 'Salt', 'count' => 0],
                    (object) ['name' => 'Scorpion Meat', 'count' => 0],
                    (object) ['name' => 'Butter', 'count' => 16462 + 31738],
                    (object) ['name' => 'Special Hot Pepper', 'count' => 58690 + 565],
                    (object) ['name' => 'Freekeh', 'count' => 193709 + 112516 + 17481], //worker
                    (object) ['name' => 'Star Anise', 'count' => 85935 + 267598], //worker
                    (object) ['name' => 'Essence of Liquor', 'count' => 46911],
                    (object) ['name' => 'Leaving Agent', 'count' => 208290],
                    (object) ['name' => 'Sugar', 'count' => 274851],
                    (object) ['name' => 'Date Palm', 'count' => 3401], //worker
                    (object) ['name' => 'Paprika', 'count' => 0],
                    (object) ['name' => 'Nutmeg', 'count' => 30760 + 36182], //worker
                    (object) ['name' => 'Teff Flour Dough', 'count' => 18608],
                    (object) ['name' => 'Freekeh Snake Stew', 'count' => 10097],
                    // (object) ['name' => 'Thick Freekeh Snake Stew', 'count' => 12029],
                    (object) ['name' => 'Mineral Water', 'count' => 0],
                    (object) ['name' => 'Teff Flour', 'count' => 37680 + 22150],
                    (object) ['name' => 'Red Sauce', 'count' => 2],
                    (object) ['name' => 'Teff Bread', 'count' => 16994],
                    // (object) ['name' => 'Spongy Teff Bread', 'count' => 16994],
                    (object) ['name' => 'Grilled Scorpion', 'count' => 4171],
                    (object) ['name' => 'Snake Meat', 'count' => 18140],

                    (object) ['name' => 'Couscous', 'count' => 781 + 1768],
                    (object) ['name' => 'Teff Sandwich', 'count' => 116213 + 12540],
                    (object) ['name' => 'King of Jungle Hamburg', 'count' => 5304 + 32228],
                    (object) ['name' => 'Fig Pie', 'count' => 8491 + 33506],
                    (object) ['name' => 'Date Palm Wine', 'count' => 27607 + 147178],
                    (object) ['name' => 'Valencia Meal', 'count' => 36015],
                    (object) ['name' => 'Special Valencia Meal', 'count' => 5895],
                ])
            ]
        ]);
    }
}
