<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->name(),
            'img'=>'',
            'price'=>rand(50000, 8000000),
            'quantity'=>rand(1, 100),
            'id_dm'=>rand(1, 10),
            'describe'=>fake()->text(255),

        ];
    }
}
