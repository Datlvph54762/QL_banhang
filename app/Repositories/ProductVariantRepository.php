<?php

namespace App\Repositories;
use App\Models\ProductVariant;

class ProductVariantRepository
{
    public function getByProduct($id)
    {
        return ProductVariant::where('product_id', $id)->get();
    }

    public function getByWithColor(){
        return ProductVariant::with('color')->get();
    }

    public function getByWithSize(){
        return ProductVariant::with('size')->get();
    }

    public function create($data){
        return ProductVariant::created($data);
    }
}