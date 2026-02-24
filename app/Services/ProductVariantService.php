<?php

namespace App\Services;

use App\Repositories\ProductVariantRepository;

class ProductVariantService{
    protected $productVariantRepo;

    public function __construct(ProductVariantRepository $productVariantRepository){
        $this->productVariantRepo= $productVariantRepository;
    }

    public function getByProduct($id){
        return $this->productVariantRepo->getByProduct($id);
    }

    public function create($data){
        return $this->productVariantRepo->create($data);
    } 
}