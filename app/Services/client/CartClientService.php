<?php

namespace App\Services\Client;

use App\Repositories\CartClientRepository;
use Illuminate\Support\Facades\Auth;

class CartClientService{
    protected $cartRepo;

    public function __construct(CartClientRepository $cartClientRepository){
        $this->cartRepo= $cartClientRepository;
    }

    public function getCartUser($id){
        $cart= $this->cartRepo->getAllCartUser($id);

        $totalAmount= 0;
        if($cart){
            foreach($cart->cartDetail as $item){
                if($item->variant){
                    $totalAmount += $item->variant->sale * $item->quantity;
                }
            }
        }
        return ['cart'=>$cart, 'totalAmount'=>$totalAmount];
    }

    public function deleteCartItem($id){
        return $this->cartRepo->deleteCart($id);
    }

    public function addVariantToCart($data){
        $userId= Auth::id();

        $variant= $this->cartRepo->findVariant($data['product_id'],$data['color_id'],$data['size_id']);

        if(!$variant){
            return [
                'success'=> false, 
                'message'=>'Sản phẩm biến thể không tồn tại'];
        }
        //Lấy hoặc thêm mới giỏ hàng
        $cart= $this->cartRepo->getOrCreateCart($userId);

        //Check id có trong giỏ
        $checkVariant= $this->cartRepo->getDetailByVariant($cart->id, $variant->id);

        $quantityItem = $checkVariant ? (int)$checkVariant->quantity : 0;

        $totalVariant = $quantityItem + (int)$data['quantity'];

        if($totalVariant > $variant->quantity){
            return [
                'success'=> false, 
                'message'=>'Xin lỗi số lượng đơn hàng không đủ để thực hiện hành động//\\'];
        }

        $price= $variant->sale;
        $totalAmount= $price * $totalVariant;

        $this->cartRepo->updateOrCreateDeatil($cart->id, $variant->id, [
            'quantity'=>$totalVariant,
            'price'=>$price,
            'total_amount'=>$totalAmount
        ]);

        return [
            'success'=> true,
            'message'=>'Thêm sản phẩm vào giỏ hàng thành công'
        ];
    }

    public function checkData($userId){
        $cart= $this->cartRepo->getCartForCheckout($userId);

        if(!$cart || $cart->cartDetail->isEmpty()){
            throw new \Exception('Giỏ hàng trống , không thể thanh toán');
        }

        $totalAmount= 0;

        foreach($cart->cartDetail as $item){
            $variant= $item->variant;

            if (!$variant || $item->quantity > $variant->quantity) {
                throw new \Exception("Sản phẩm {$variant->product->name} hiện không đủ hàng.");
            }

            $totalAmount += $variant->sale * $item->quantity;
        }

        return [
            'cart'=>$cart,
            'totalAmount'=>$totalAmount,
            'shippingFee'=>30000
        ];
    }
}