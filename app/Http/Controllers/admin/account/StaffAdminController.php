<?php

namespace App\Http\Controllers\admin\account;

use App\Http\Controllers\Controller;
use App\Services\RoleService;
use App\Services\StaffAdminService;
use Illuminate\Http\Request;

class StaffAdminController extends Controller
{
    protected $staffAdminService;
    protected $roleService;

    public function __construct(StaffAdminService $staffAdminService, RoleService $roleService){
        $this->staffAdminService= $staffAdminService;
        $this->roleService= $roleService;
    }

    public function index(){
        $staffs = $this->staffAdminService->getAllStaff();

        return view('admin.accounts.staffs.index', compact('staffs'));
    }

    public function create(){
        $roles= $this->roleService->getAllRole();

        return view('admin.accounts.staffs.create', compact('roles'));
    }
}
