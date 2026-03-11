<?php

namespace App\Services\client;

use App\Repositories\AuthRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthClientService
{
    protected $authRepo;

    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepo = $authRepository;
    }

    public function checkAuthClient($data)
    {
        $user = $this->authRepo->findByEmail($data['email']);

        if ($user && Hash::check($data['password'], $user->password)) {
            Auth::login($user);
            return true;
        }
        return false;
    }
}