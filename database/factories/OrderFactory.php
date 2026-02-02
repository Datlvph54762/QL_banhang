<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $subtotal = fake()->numberBetween(300000, 3000000);
        $discount = fake()->boolean(30)
            ? fake()->numberBetween(50000, 300000)
            : 0;

        return [
            'user_id' => User::inRandomOrder()->value('id'),
            'order_code' => fake()->unique()->bothify('ORD###'),
            'name' => fake()->name(),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'subtotal' => $subtotal,
            'discount' => $discount,
            'total_amount' => $subtotal - $discount,
            'note' => fake()->boolean(40) ? fake()->sentence() : null,
        ];
    }
}
