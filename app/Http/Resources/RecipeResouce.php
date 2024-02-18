<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

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
            'crafts' => $this->crafts,
            // 'ingredients' => $this->ingredients,
            'ingredients' => IngredientResouce::collection($this->ingredients),
        ];
    }
}
