<?php

namespace App\Services;

use App\Repositories\ProductVariantRepository;
use Illuminate\Support\Facades\Storage;

class ProductVariantService
{
    protected $productVariantRepo;

    public function __construct(ProductVariantRepository $productVariantRepository)
    {
        $this->productVariantRepo = $productVariantRepository;
    }

    public function getByProduct($id)
    {
        return $this->productVariantRepo->getByProduct($id);
    }

    public function create($data)
    {
        if (isset($data['image'])) {
            $data['image'] = $this->uploadImage($data['image']);
        }
        return $this->productVariantRepo->create($data);
    }

    private function uploadImage($file)
    {
        $path = $file->store('Variants', 'public');

        return $path;
    }

    public function findId($id)
    {
        return $this->productVariantRepo->findId($id);
    }

    public function update($id, $data)
    {
        $productVariant= $this->productVariantRepo->findId($id);

        if(isset($data['image'])){
            if($productVariant->image && Storage::disk('public')->exists($productVariant->image)){
                Storage::disk('public')->delete($productVariant->image);
            }
            $data['image']= $data['image']->store('variant','public');
        }

        return $this->productVariantRepo->update($id, $data);
    }
}