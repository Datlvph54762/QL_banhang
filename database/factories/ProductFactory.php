<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $name = fake()->words(3, true);

        return [
            'category_id' => Category::inRandomOrder()->value('id'),
            'product_code' => fake()->unique()->bothify('SP###'),
            'name' => $name,
            'image' => 'products/default.png',
            'description' => fake()->paragraph(),
            'material' => fake()->word(),
        ];
    }
}
