<?php

namespace App\Http\Controllers\admin\account;

use App\Http\Controllers\Controller;
use App\Services\RoleService;
use Illuminate\Http\Request;

class RoleAdminController extends Controller
{
    protected $roleService;

    public function __construct(RoleService $roleService){
        $this->roleService =$roleService;
    }
    public function index(){
        $roles= $this->roleService->getAllRole();

        return view('admin.accounts.roles-permession.index', compact('roles'));
    }

    public function create(){
        $permissions= $this->roleService->getAllPermission();
        return view('admin.accounts.roles-permession.create', compact('permissions'));
    }
}
