<?php

namespace App\Http\Controllers\admin\account;

use App\Http\Controllers\Controller;
use App\Services\RoleService;
use Illuminate\Http\Request;

class RoleAdminController extends Controller
{
    protected $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }
    public function index()
    {
        $roles = $this->roleService->getAllRole();

        return view('admin.accounts.roles-permession.index', compact('roles'));
    }

    public function create()
    {
        $permissions = $this->roleService->getAllPermission();
        return view('admin.accounts.roles-permession.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:roles,name|max:255',
            'permissions' => 'required|array', 
            'permissions.*' => 'exists:permissions,id',
        ]);
        $this->roleService->create($data);

        return redirect()->route('admin.accounts.roles-permission.index')->with('success','Tạo mới vai trò và quyền hạn <>');
    }

    public function edit($id){
        $role= $this->roleService->findById($id);
        $permissions= $this->roleService->getAllPermission();

        return view('admin.accounts.roles-permession.edit', compact('permissions','role'));
    }

    public function update(Request $request , $id){
        $data = $request->validate([
            'name' => 'required|max:255',
            'permissions' => 'required|array', 
            'permissions.*' => 'exists:permissions,id',
        ],
        [
            'name.required'=>'Tên role khoông được để trống',
            'permissions.required'=>'Phải chọn ít nhất là 1 quyền',
        ]);

        $this->roleService->update($id, $data);

        return redirect()->route('admin.accounts.roles-permission.index')->with('success', 'cập nhật vai trò thành công');
    }
}
