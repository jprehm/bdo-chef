<?php

namespace App\Models;

use App\Enums\IngredientType;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ingredient extends Model
{
    use HasFactory, SoftDeletes;

    public $fillable = [
        'name',
        'weight',
        'type',
    ];

    public $casts = [
        'name' => 'string',
        'weight' => 'decimal:2',
        'type' => IngredientType::class,
    ];

    public $appends = [
        'count',
    ];

    public function count(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->pivot['count'],
        );
    }

    public function isCraftable(): bool
    {
        return $this->type !== IngredientType::VENDOR->value;
    }

    public function users(): MorphToMany
    {
        return $this->morphedByMany(User::class, 'ingredientable');
    }

    public function recipes(): MorphToMany
    {
        return $this->morphedByMany(Recipe::class, 'ingredientable');
    }
}
