<?php

namespace App\Repositories;
use App\Models\ProductVariant;

class ProductVariantRepository
{
    public function getByProduct($id)
    {
        return ProductVariant::orderBy('id', 'desc')->where('product_id', $id)->get();
    }

    public function getByWithColor()
    {
        return ProductVariant::with('color')->get();
    }

    public function getByWithSize()
    {
        return ProductVariant::with('size')->get();
    }

    public function create($data)
    {
        return ProductVariant::create($data);
    }

    public function findId($id){
        return ProductVariant::findOrFail($id);
    }

    public function update($id, $data)
    {
        $productVariant = ProductVariant::findOrFail($id);

        return $productVariant->updated($data);
    }
}