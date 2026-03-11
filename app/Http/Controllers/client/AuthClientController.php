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

    public function showRegister(){
        return view('client.login.register');
    }

    public function createUser(Request $request){
        $data= $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable|string|max:10',
            'address' => 'nullable|string|max:255',
            'password' => 'required|min:6'
        ], [
            'name.required' => 'Tên không được để trống',
            'name.max' => 'Tên không được quá 255 ký tự',

            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại',

            'phone.max' => 'Số điện thoại tối đa 10 ký tự',

            'address.max' => 'Địa chỉ không được quá dài',

            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu phải ít nhất 6 ký tự'
        ]);

        $user= $this->authClientService->createUser($data);

        if($user){
            return redirect()->route('client.login');
        }

        return back()->with('error','Đã có lỗi xảy ra vui lòng thử lại');


    }
}
