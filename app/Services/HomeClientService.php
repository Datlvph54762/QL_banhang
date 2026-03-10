<?php

namespace App\Services;

use App\Repositories\HomeRepository;

class HomeClientService{
    protected $homeRepo;

    public function __construct(HomeRepository $homeRepository){
        $this->homeRepo= $homeRepository;
    }

    public function getAllHome(){
       $products= $this->homeRepo->getAll();

       foreach($products as $product){
            $product->price= $product->Variant->min('price');
            $product->sale= $product->Variant->min('sale');
       }

       return $products;
    }
}