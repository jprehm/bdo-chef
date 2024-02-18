<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRecipeRequest;
use App\Http\Requests\UpdateRecipeRequest;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Services\CraftingCalculator;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request?->selected) {
            $recipe = Recipe::where('id', $request?->selected['id'])
                ->with('ingredients')
                ->sole();

            $recipe = (new CraftingCalculator($request->user()->load('ingredients'), $recipe))->run();
        }

        return Inertia::render('Dashboard', [
            'recipes' => Recipe::all(),
            'selected' => $request?->selected,
            'recipe' => $request?->selected ? $recipe : null,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRecipeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Recipe $recipe)
    {
        return Inertia::render('Dashboard', [
            'recipes' => Recipe::all(),
            'recipe' => $recipe
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipe $recipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRecipeRequest $request, Recipe $recipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe)
    {
        //
    }
}
