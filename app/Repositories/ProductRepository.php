<?php

namespace App\Repositories;
use App\Models\Product;

class ProductRepository
{
    public function getAll()
    {
        return Product::orderBy('id', 'desc')->get();
    }
    public function getAllWithCategory()
    {
        return Product::with('category')->get();
    }

    public function create($data)
    {
        return Product::create($data);
    }

    public function findId($id)
    {
        return Product::findOrFail($id);
    }

    public function update($id, $data)
    {
        $product = Product::findOrFail($id);

        return $product->update($data);
    }
}