<?php

namespace App\Repositories;

use App\Models\User;

class StaffAdminRepository{
    public function getStaff(){
        return User::orderBy('id', 'desc')->where('role_id',2)->get();
    }
}