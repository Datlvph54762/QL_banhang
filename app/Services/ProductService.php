<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    protected $productRepo;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepo = $productRepository;
    }

    public function getAllProduct($search=null)
    {
        return $this->productRepo->getAll($search);
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

    public function findId($id)
    {
        return $this->productRepo->findId($id);
    }

    public function update($id, $data)
    {
        $product = $this->productRepo->findId($id);
        
        if (isset($data['image'])) {
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $data['image']->store('product', 'public');
        }
        return $this->productRepo->update($id, $data);
    }
}