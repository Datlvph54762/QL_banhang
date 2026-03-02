<?php
namespace App\Repositories;
use App\Models\User;

class AuthRepository{
    public function findbyEmail($email){
        return User::where('email', $email)->first();
    }
}