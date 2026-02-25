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
        if(isset($data['image'])){
            $data['image'] = $this->uploadImage($data['image']);
        }
        return $this->productVariantRepo->create($data);
    } 

    private function uploadImage($file)
    {
        $path = $file->store('Variants', 'public');

        return $path;
    }
}