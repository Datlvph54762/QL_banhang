<?php

namespace App\Services;

use App\Repositories\ProductRepository;

class ProductService
{
    protected $productRepo;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepo = $productRepository;
    }

    public function getAllProduct()
    {
        return $this->productRepo->getAll();
    }

    public function create($data){
        return $this->productRepo->create($data);
    }
}