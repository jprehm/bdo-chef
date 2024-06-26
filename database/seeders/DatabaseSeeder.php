<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Jeff Prehm',
            'email' => 'japrehm@gmail.com',
        ]);

        $this->call([
            IngredientSeeder::class,
            RecipeSeeder::class,
            ConsumableSeeder::class,
        ]);
    }
}
