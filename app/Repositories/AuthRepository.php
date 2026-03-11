<?php
namespace App\Repositories;
use App\Models\User;

class AuthRepository
{
    public function findbyEmail($email)
    {
        return User::where('email', $email)->first();
    }

    //client
    public function createUser($data)
    {
        $data['role_id'] = 3;
        $data['password'] = bcrypt($data['password']);
        
        return User::create($data);
    }
}