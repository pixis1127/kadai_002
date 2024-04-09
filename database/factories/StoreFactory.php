<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id' => fake()->unique()->randomNumber(2, true),
            'name' => fake()->company(),
            'description' => fake()->Text(30),
            'price' => fake()->numberBetween(900, 2500),
            'category_id' => fake()->randomNumber(1, 7)  
        ];
    }
}
