<?php

namespace App\Services\client;

use App\Repositories\ProductRepository;

class ProductClientService{
    protected $productRepo;

    public function __construct(ProductRepository $productRepository){
        $this->productRepo= $productRepository;
    }

    public function showProduct($id){
        $product=$this->productRepo->findId($id);
        $product->related_products =$this->productRepo->getCategoryShowProduct($product->category_id,$id);

        return $product;
    }

    // public function categoryShowProduct($id){
    //     return $this->productRepo->getCategoryShowProduct($id);
    // }
}