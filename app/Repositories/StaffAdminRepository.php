<?php

namespace App\Repositories;

use App\Models\User;

class StaffAdminRepository{
    public function getStaff(){
        return User::with('role')->orderBy('id', 'desc')->whereIn('role_id',[2,4,5])->get();
    }

    public function create(){
        return User::create();
    }
}