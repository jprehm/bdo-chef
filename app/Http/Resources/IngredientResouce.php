<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IngredientResouce extends JsonResource
{
    public static $wrap = false;

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'type' => ucfirst($this->type),
            'count' => $this->count,
            'crafts' => $this->whenHas($this->crafts),
            'on_hand' => $this->whenHas($this->on_hand),
            'needed' => $this->whenHas($this->needed),
            'ingredients' => IngredientResouce::collection($this->whenHas('ingredients')),
        ];
    }
}
