<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Jeff Prehm',
            'email' => 'japrehm@gmail.com',
        ]);

        \App\Models\User::factory(10)->create();

        $this->call([
            IngredientSeeder::class,
            RecipeSeeder::class,
            ConsumableSeeder::class,
        ]);
    }
}
