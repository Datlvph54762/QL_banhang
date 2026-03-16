<?php

namespace App\Repositories;
use App\Models\Product;

class HomeRepository
{
    public function getAll($search=null, $categoryId=null)
    {
        return Product::with('Variant')->when($search,function($query)use ($search){
            $query->where('name', 'ILIKE', "%{$search}%");
        })
        ->when($categoryId, function ($query) use($categoryId){
            $query->where('category_id',$categoryId);
        })
        ->get();    
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