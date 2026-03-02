<?php

namespace App\Repositories;

use App\Models\User;

class UserAdminRepository{
    public function getUser(){
        return User::orderBy('id','desc') ->where('role_id',2)->get();
    }
}