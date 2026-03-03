<?php

namespace App\Http\Controllers\admin\account;

use App\Http\Controllers\Controller;
use App\Services\StaffAdminService;
use Illuminate\Http\Request;

class StaffAdminController extends Controller
{
    protected $staffAdminService;

    public function __construct(StaffAdminService $staffAdminService){
        $this->staffAdminService= $staffAdminService;
    }

    public function index(){
        $staffs = $this->staffAdminService->getAllStaff();

        return view('admin.accounts.staffs.index', compact('staffs'));
    }

    public function create(){
        return view('admin.accounts.staffs.create');
    }
}
