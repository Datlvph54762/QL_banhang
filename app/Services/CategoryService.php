<?php

namespace App\Services;
use App\Repositories\CategoryRepository;

class CategoryService
{
    protected $categoryRepo;

    public function __construct(CategoryRepository $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }

    public function getAllCategory()
    {
        return $this->categoryRepo->getAll();
    }

    public function create($data){
        return $this->categoryRepo->create($data);
    }

}