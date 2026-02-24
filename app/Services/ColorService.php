<?php

namespace App\Services;

use App\Repositories\ColorRepository;

class ColorService{
    protected $colorRepo;

    public function __construct(ColorRepository $colorRepository){
        $this->colorRepo= $colorRepository;
    }

    public function getAllColor(){
        return $this->colorRepo->getAll();
    }
}