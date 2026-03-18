<?php

namespace App\Repositories;

use App\Models\Cart;
use App\Models\CartDetail;

class CartClientRepository{
    public function getAllCartUser($id){
        return Cart::with('cartDetail.variant')->where('user_id',$id)->first();
    }

    public function deleteCart($id){
        return CartDetail::where('id', $id)->delete($id);
    }
}