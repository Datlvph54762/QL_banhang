<?php

namespace App\Repositories;
use App\Models\Category;
use Symfony\Component\HttpFoundation\Request;

class CategoryRepository
{
    public function getAll()
    {
        return Category::all();
    }

    public function create($data){
        return Category::create($data);
    }
}