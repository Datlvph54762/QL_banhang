<?php

namespace App\Services;

use App\Repositories\RoleRepository;
use Illuminate\Support\Facades\DB;

class RoleService{
    protected $roleRepo;

    public function __construct(RoleRepository $roleRepository){
        $this->roleRepo= $roleRepository;
    }

    public function getAllRole(){
        return $this->roleRepo->getAll();
    }

    public function findById($id){
        return $this->roleRepo->findId($id);
    }
    public function create($data){
        return DB::transaction(function () use ($data) {
            $role = $this->roleRepo->create([
                'name' => $data['name']
            ]);

            // 2. Lưu các quyền vào bảng trung gian (Dùng mảng ID quyền từ Form)
            if (!empty($data['permissions'])) {
                $this->roleRepo->syncPermissions($role, $data['permissions']);
            }
                
            return $role;
        });
    }

    //Permission
    public function getAllPermission(){
        return $this->roleRepo->getPermission();
    }
}