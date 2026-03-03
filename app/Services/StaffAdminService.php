<?php

namespace App\Services;

use App\Repositories\StaffAdminRepository;

class StaffAdminService
{
    protected $staffAdminRepo;

    public function __construct(StaffAdminRepository $staffAdminRepository)
    {
        $this->staffAdminRepo = $staffAdminRepository;
    }

    public function getAllStaff()
    {
        return $this->staffAdminRepo->getStaff();
    }

    public function create($data){
        return $this->staffAdminRepo->create($data);
    }
}