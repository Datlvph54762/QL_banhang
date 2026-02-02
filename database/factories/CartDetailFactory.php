<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Models\ProductVariant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CartDetail>
 */
class CartDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $price = fake()->numberBetween(100000, 1000000);
        $qty = fake()->numberBetween(1, 5);
        return [
            'cart_id' => Cart::inRandomOrder()->value('id'),
            'product_variant_id' => ProductVariant::inRandomOrder()->value('id'),
            'price' => $price,
            'quantity' => $qty,
            'total_amount' => $price * $qty,
        ];
    }
}
