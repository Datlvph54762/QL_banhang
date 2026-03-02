<?php

namespace App\Http\Controllers\admin\account;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\UserAdminService;
use Illuminate\Http\Request;

class UserAdminController extends Controller
{
    protected $userAdminService;

    public function __construct(UserAdminService $userAdminService){
        $this->userAdminService = $userAdminService;
    }

    public function index(){
        $users= $this->userAdminService->getAllUser();

        return view('admin.accounts.users.index', compact('users'));
    }
}
