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

    public function findById($id)
    {
        return $this->staffAdminRepo->findId($id);
    }

    public function update($id, $data)
    {
        return $this->staffAdminRepo->update($id, $data);
    }
}