<?php

namespace App\Services;

use App\Http\Resources\RecipeResouce;
use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\User;

class CraftingCalculator
{
    public function __construct(
        private User $user,
        private Recipe $recipe
    ) {
    }

    public function run()
    {
        $this->recipe
            ->ingredients
            ->transform(function (Ingredient $item) {
                return $this->procressIngredient($item);
            });

        $this->recipe->crafts = $this->recipe->ingredients
            ->where('type', '!=', 'vendor')
            ->min('recipe_crafts') ?? 0;

        $this->recipe
            ->ingredients
            ->transform(function (Ingredient $item) {
                $item->needed = $this->recipe->crafts * $item->count;

                return $item;
            });

        return new RecipeResouce($this->recipe);
    }

    private function procressIngredient(Ingredient $item): Ingredient
    {
        $ingredient = $this->user->ingredients
            ->filter(fn (Ingredient $ingredient) => $ingredient->id === $item->id)
            ->first();

        $item->on_hand = $ingredient->count;
        $count = $ingredient->count;

        if ($ingredient->isCraftable()) {
            $recipe = $this->getIngredients($ingredient);
            if (! is_null($recipe)) {
                $item->crafts = $recipe->crafts;
                $item->ingredients = $recipe->ingredients;
                $count = $ingredient->count + $item->crafts;
            }
        }

        $item->recipe_crafts = $ingredient->isCraftable() ? (int) floor($count / $item->count) : 0;

        return $item;
    }

    private function getIngredients(Ingredient $item)
    {
        $recipe = Recipe::where('name', $item->name)->first();

        if (is_null($recipe?->ingredients)) {
            return $recipe;
        }

        $recipe
            ->ingredients
            ->transform(function (Ingredient $item) {
                return $this->procressIngredient($item);
            });

        $recipe->crafts = $recipe->ingredients
            ->where('type', '!=', 'vendor')
            ->min('recipe_crafts') ?? 0;

        $recipe
            ->ingredients
            ->transform(function (Ingredient $item) use ($recipe) {
                $item->needed = $recipe->crafts * $item->count;

                return $item;
            });

        return new RecipeResouce($recipe);
    }
}
