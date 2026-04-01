<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Str;

class CheckoutRepository{
    public function createOrder($data){
        $data['order_code']= 'ORD' . date('Ymd') . '-' . strtoupper(Str::random(5));
    
        $data['status_id'] = 1;

        $data['payment_method'] = 'COD';

        return Order::create($data);
    }

    public function createOrderDetail($data){

        return OrderDetail::create($data);
    }
}