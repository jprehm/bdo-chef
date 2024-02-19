<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Number;

class RecipeResouce extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'type' => ucfirst($this->type),
            'crafts' => Number::format($this->crafts ?? 0),
            'ingredients' => IngredientResouce::collection($this->ingredients),
        ];
    }
}
