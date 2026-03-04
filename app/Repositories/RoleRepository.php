<?php

namespace App\Repositories;

use App\Models\Role;

class RoleRepository{
    public function getAll(){
        return Role::whereNotIn('id',[1,3])->get();
    }

    public function findId($id){
        return Role::findOrFail($id);
    }
}