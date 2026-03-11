<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Services\client\AuthClientService;
use Illuminate\Http\Request;

class AuthClientController extends Controller
{
    protected $authClientService;

    public function __construct(AuthClientService $authClientService){
        $this->authClientService= $authClientService;
    }

    public function showLoginClient(){
        return view('client.login.login');
    }

    public function loginClient(Request $request){
        $data = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ], [
            'email.required'    => 'Vui lòng nhập Email.',
            'email.email'       => 'Email không đúng định dạng.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.min'      => 'Mật khẩu phải từ 6 ký tự.',
        ]);

        if($this->authClientService->checkAuthClient($data)){
            $request->session()->regenerate();

            return redirect()->route('client.home');
        }

        return back()->withErrors([
            'login_error' => 'Email hoặc mật khẩu không chính xác.',
        ])->withInput($request->only('email'));
    }
}
