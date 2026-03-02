<?php

namespace App\Services;

use App\Repositories\UserAdminRepository;

class UserAdminService
{
    protected $userAdminRepo;

    public function __construct(UserAdminRepository $userAdminRepository)
    {
        $this->userAdminRepo = $userAdminRepository;
    }

    public function getAllUser()
    {
        return $this->userAdminRepo->getUser();
    }
}