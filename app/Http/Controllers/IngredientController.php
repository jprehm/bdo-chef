<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIngredientRequest;
use App\Http\Requests\UpdateIngredientRequest;
use App\Http\Resources\IngredientResouce;
use App\Models\Ingredient;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Str;

class IngredientController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return Inertia::render('Ingredients', [
            'ingredients' => IngredientResouce::collection(
                $request->user()
                    ->ingredients
                    ->filter(function ($item) use ($request) {
                        if (empty($request?->term)) {
                            return true;
                        }
                        return Str::contains($item->name, $request->term);
                    })
            )->resource,
            'term' => $request?->term,
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
    public function store(StoreIngredientRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Ingredient $ingredient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ingredient $ingredient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIngredientRequest $request, Ingredient $ingredient)
    {
        $request->user()->ingredients()->updateExistingPivot(
            $ingredient->id,
            ['count' => $request->count]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ingredient $ingredient)
    {
        //
    }
}
