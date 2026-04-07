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
            if ($user->role_id == 3) {
                return 'not_authorized';
            }

            if($user->status == 0){
                return 'disable';
            }
            Auth::guard('admin')->login($user);
            return 'success';
        }
        return 'wrong_credentials';
    }
}
