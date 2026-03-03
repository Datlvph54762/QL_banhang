<?php

namespace App\Services;

use App\Repositories\RoleRepository;

class RoleService{
    protected $roleRepo;

    public function __construct(RoleRepository $roleRepository){
        $this->roleRepo= $roleRepository;
    }

    public function getAllRole(){
        return $this->roleRepo->getAll();
    }
}