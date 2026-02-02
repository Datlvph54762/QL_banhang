<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\ProductVariant;
use Illuminate\Database\Seeder;

class CartDetailSeeder extends Seeder
{
    public function run(): void
    {
        CartDetail::factory()->count(50)->create();
    }
}
