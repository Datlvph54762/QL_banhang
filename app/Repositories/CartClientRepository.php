<?php

namespace App\Repositories;

use App\Models\Cart;

class CartClientRepository{
    public function getAllCartUser($id){
        return Cart::with('cartDetail.variant')->where('user_id',$id)->first();
    }
}