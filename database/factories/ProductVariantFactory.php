<?php

namespace Database\Factories;

use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductVariant>
 */
class ProductVariantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::inRandomOrder()->value('id'),
            'size_id' => Size::inRandomOrder()->value('id'),
            'color_id' => Color::inRandomOrder()->value('id'),
            'image' => 'variants/default.png',
            'price' => fake()->numberBetween(100000, 500000),
            'sale' => fake()->numberBetween(0, 30),
            'quantity' => fake()->numberBetween(1, 100),
        ];
    }
}
