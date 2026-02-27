<?php

namespace App\Repositories;
use App\Models\Product;

class ProductRepository
{
    public function getAll($search = null)
    {
        return Product::orderBy('id', 'desc')
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->paginate(10);
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
        return Product::with(['category', 'variant.color', 'variant.size'])
            ->findOrFail($id);
    }

    public function update($id, $data)
    {
        $product = Product::findOrFail($id);

        return $product->update($data);
    }
}