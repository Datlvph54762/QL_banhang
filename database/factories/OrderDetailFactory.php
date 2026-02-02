<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\ProductVariant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderDetail>
 */
class OrderDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $price = fake()->numberBetween(100000, 1500000);
        $quantity = fake()->numberBetween(1, 5);

        return [
            'order_id' => Order::inRandomOrder()->value('id'),
            'product_variant_id' => ProductVariant::inRandomOrder()->value('id'),
            'price' => $price,
            'quantity' => $quantity,
            'status' => fake()->randomElement(['pending', 'shipping', 'completed']),
            'note' => fake()->boolean(30) ? fake()->sentence() : null,
        ];
    }
}
