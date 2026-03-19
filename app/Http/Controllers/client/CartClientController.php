<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Services\Client\CartClientService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartClientController extends Controller
{
    protected $cartService;

    public function __construct(CartClientService $cartClientService){
        $this->cartService= $cartClientService;
    }

    public function index(){
        if(!auth()->guard('web')->check()){
            return redirect()->route('client.login')->with('error', 'Bạn không có quyền truy cập nếu chưa đăng nhập');
        }
        $userId = auth()->guard('web')->id();

        $data= $this->cartService->getCartUser($userId);

        return view('client.carts.index', $data);        
    }

    public function detroy($id){
        $this->cartService->deleteCartItem($id);

        return redirect()->route('client.carts.index')->with('success', 'XÓa thành công');
    }
}
