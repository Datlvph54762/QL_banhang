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
        $userId= Auth::id();
        $data= $this->cartService->getCartUser($userId);

        return view('client.carts.index', $data);        
    }
}
