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

    public function __construct(StaffAdminService $staffAdminService, RoleService $roleService)
    {
        $this->staffAdminService = $staffAdminService;
        $this->roleService = $roleService;
    }

    public function index()
    {
        $staffs = $this->staffAdminService->getAllStaff();

        return view('admin.accounts.staffs.index', compact('staffs'));
    }

    public function create()
    {
        $roles = $this->roleService->getAllRole();

        return view('admin.accounts.staffs.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'role_id' => 'required|exists:roles,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:users,phone',
            'password' => 'required|string|min:8|confirmed',
            'address' => 'nullable|string|max:500',
        ], [
            'email.required' => 'Email không đc để trống',
            'email.unique' => 'Email này đã được sử dụng trong hệ thống.',
            'phone.required' => 'Số điện thoại không được để trống.',
            'phone.unique' => 'Số điện thoại này đã tồn tại.',
            'phone.regex' => 'Số điện thoại không đúng định dạng.',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp.',
        ]);
        
        $this->staffAdminService->create($data);

        return redirect()->route('admin.accounts.staffs.index')->with('success','Thêm danh sách Staff thành công');
    }

    public function edit($id){
        $user= $this->staffAdminService->findById($id);
        $roles= $this->roleService->getAllRole();

        return view('admin.accounts.staffs.edit', compact('roles','user'));
    }
}
