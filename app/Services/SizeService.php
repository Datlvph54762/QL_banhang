<?php

namespace App\Services;

use App\Repositories\SizeRepository;

class SizeService{
    protected $sizeRepo;

    public function __construct(SizeRepository $sizeRepository){
        $this->sizeRepo= $sizeRepository;
    }

    public function getAllSize(){
        return $this->sizeRepo->getAll();
    }
}