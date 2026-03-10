<?php

namespace App\Repositories;
use App\Models\Product;

class HomeRepository
{
    public function getAll()
    {
        return Product::with('Variant')->get(); 
    }

}