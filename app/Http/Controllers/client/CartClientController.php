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

    public function addToCart(Request $request){
        if(!Auth::check()){
            return redirect()->route('client.login')->with('error','Bạn cần đăng nhập để thực hiện hành động thêm sản phẩm vào giỏ hàng!!!');
        }

        $data=$request->validate([
            'product_id'=> 'required|exists:products,id',
            'color_id'=> 'required',
            'size_id'=> 'required',
            'quantity'=> 'required|integer|min:1',
        ],
        [
            'product_id.exists'=>'Sản phẩm không hợp lệ',
            'color_id.required'=>'Vui lòng chọn màu',
            'size_id.required'=>'Vui lòng chọn size',
        ]);
        $result= $this->cartService->addVariantToCart($data);

        if(!$result['success']){
            return back()->with('error',$result['message'])->withInput();
        }

        return back()->with('success', $result['message']);
    }

    public function checkout(){
        if(!Auth::check()){
            return redirect()->route('client.login')->with('error','Bạn cần đăng nhập để thực hiện hành động thêm sản phẩm vào giỏ hàng!!!');
        }

        try{
            $userId= Auth::id();

            $data= $this->cartService->checkData($userId);

            return view('client.checkout.index', $data);
        }catch(\Exception $e){
            return redirect()->route('client.carts.index')->with('error', $e->getMessage());
        }
    }
}
