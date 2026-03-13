<?php

namespace App\Repositories;
use App\Models\Product;

class HomeRepository
{
    public function getAll()
    {
        return Product::with('Variant')->get(); 
    }

    public function findId($id)
    {
        return Product::with(['category', 'variant.color', 'variant.size'])
            ->findOrFail($id);
    }

    public function getCategoryShowProduct($id, $excludeId)
    {
        return Product::with('category', 'Variant')
            ->where('category_id', $id)->limit(5)
            ->where('id', '!=',$excludeId)->get();
    }

}