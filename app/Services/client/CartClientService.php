<?php

namespace App\Services\Client;

use App\Repositories\CartClientRepository;

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
}