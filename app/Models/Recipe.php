<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Recipe extends Model
{
    use HasFactory;

    public function ingredients(): MorphToMany
    {
        return $this->morphToMany(Ingredient::class, 'ingredientable')->withPivot('count');
    }
}
