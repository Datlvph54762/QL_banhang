<?php

namespace App\Repositories;
use App\Models\Product;

class ProductRepository
{
    public function getAll()
    {
        return Product::orderBy('id', 'desc')->get();
    }
    public function getAllWithCategory(){
        return Product::with('category')->get();
    }
}