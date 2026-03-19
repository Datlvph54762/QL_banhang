<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService=$authService;
    }
    public function showLogin(){
        return view('login.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'=> 'required|email',
            'password'=> 'required|min:6',
        ],[
            'email.required'=>'The email address must not be blank.',
            'email.email'=>'The email address is not in the correct format, please re-enter it.',
            'password.required'=>'Password cannot be left blank.'
        ]);

        $result = $this->authService->checkLogin($request->all());

        if ($result==='success') {
            return redirect()->route('admin.dashboard');
        }

        if ($result === 'not_authorized') {
            return back()->withErrors(['error' => 'Tài khoản của bạn không có quyền truy cập trang Quản trị!']);
        }

        return back()->withErrors(['error' => 'Incorrect email or password!']);
    }

    public function logout(Request $request){
        Auth::guard('admin')->logout();

        return redirect()->route('login');
    }
}
