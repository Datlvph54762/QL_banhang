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

    public function create($data)
    {
        if (isset($data['image'])) {
            $data['image'] = $this->uploadImage($data['image']);
        };
        return $this->productRepo->create($data);
    }

    private function uploadImage($file)
    {
        $path = $file->store('product', 'public');

        return $path;
    }
}