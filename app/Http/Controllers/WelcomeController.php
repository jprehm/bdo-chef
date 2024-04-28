<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class WelcomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login') && ! Auth::check(),
            'canRegister' => Route::has('register') && ! Auth::check(),
            'recipe_count' => Recipe::query()->count(),
            'ingredient_count' => Ingredient::query()->count(),
            'user_count' => User::query()->count(),
        ]);
    }
}
