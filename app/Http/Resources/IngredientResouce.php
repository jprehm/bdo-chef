<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Number;

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
            'crafts' => Number::format($this->crafts ?? 0),
            'on_hand' => Number::format($this->on_hand ?? 0),
            'needed' => Number::format($this->needed ?? 0),
            'ingredients' => IngredientResouce::collection($this->whenHas('ingredients')),
        ];
    }
}
