<?php

namespace App\Services;

use App\Models\Ingredient;
use App\Models\User;

class UserInventorySeeder
{
    public function __construct(
        private User $user
    ) {
    }

    public function run(): void
    {
        Ingredient::all()->each(function ($item) {
            $this->user->ingredients()->attach(
                $item->id,
                ['count' => 0]
            );
        });
    }
}
