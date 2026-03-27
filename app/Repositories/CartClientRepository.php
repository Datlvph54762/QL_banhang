<?php

namespace App\Repositories;

use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\ProductVariant;

class CartClientRepository{
    public function getAllCartUser($id){
        return Cart::with('cartDetail.variant')->where('user_id',$id)->first();
    }

    public function deleteCart($id){
        return CartDetail::where('id', $id)->delete($id);
    }

    public function getOrCreateCart($id){
        return Cart::firstOrCreate(['user_id'=>$id]);
    }

    public function findVariant($productId, $colorId, $sizeId){
        return ProductVariant::where('product_id',$productId)
            ->where('color_id',$colorId)
            ->where('size_id',$sizeId)
            ->first();
    }

    public function getDetailByVariant($cartId, $variantId){
        return CartDetail::where('cart_id',$cartId)
            ->where('product_variant_id',$variantId)
            ->first();
    }

    public function updateOrCreateDeatil($cartId, $variantId, $data){
        return CartDetail::updateOrCreate(
            [
                'cart_id' => $cartId,
                'product_variant_id' => $variantId
            ],
            [
                'quantity' => $data['quantity'],
                'price' => $data['price'],
                'total_amount' => $data['total_amount']
            ]
        );
    }

    public function getCartForCheckout($userId){
        return Cart::with(
            'cartDetail.variant.product', 
            'cartDetail.variant.color', 
            'cartDetail.variant.size'
            )->where('user_id', $userId)
            ->first();
    } 
}