<?php

namespace App\Repositories;

use App\Models\Permission;
use App\Models\Role;

class RoleRepository{

    //Role
    public function getAll(){
        return Role::with('permissions')->whereNotIn('id',[1,3])->get();
    }

    public function findId($id){
        return Role::findOrFail($id);
    }
    public function create($data){
        return Role::create($data);
    }

    //Permission
    public function getPermission(){
        return Permission::all();
    }
}