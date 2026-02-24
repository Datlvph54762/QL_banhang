<?php

namespace App\Repositories;
use App\Models\ProductVariant;

class ProductVariantRepository
{
    public function getByProduct($id)
    {
        return ProductVariant::where('product_id', $id)->get();
    }
}