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

    public function create($data)
    {
        return $this->categoryRepo->create($data);
    }
    public function findById($id)
    {
        return $this->categoryRepo->findById($id);
    }

    public function update($id, $data)
    {
        return $this->categoryRepo->update($id, $data);
    }

}