<?php

namespace App\Services\client;

use App\Repositories\HomeRepository;
use App\Repositories\ProductRepository;

class ProductClientService{
    protected $homeRepo;

    public function __construct(HomeRepository $homeRepository){
        $this->homeRepo= $homeRepository;
    }

    public function showProduct($id){
        $product=$this->homeRepo->findId($id);
        $product->related_products =$this->homeRepo->getCategoryShowProduct($product->category_id,$id);

        return $product;
    }
}