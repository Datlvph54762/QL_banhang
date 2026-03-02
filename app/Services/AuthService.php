<?php

namespace App\Services;
use App\Repositories\AuthRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    protected $userRepo;
    public function __construct(AuthRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function checkLogin($data)
    {
        $user = $this->userRepo->findByEmail($data['email']);

        if ($user && Hash::check($data['password'], $user->password)) {
            Auth::login($user);
            return true;
        }
        return false;
    }
}
