<?php

namespace App\Repositories;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\PaymentStatus;
use Illuminate\Support\Facades\Auth;

class OrderRepository
{
    public function getAll()
    {
        return Order::orderBy('id', 'desc')->get();
    }

    public function findOrder($id)
    {
        return Order::with(
            'user',
            'status',
            'paymentStatus',
            'orderDetails',
            'orderDetails.variants.product',
            'orderDetails.variants.color',
            'orderDetails.variants.size',
        )->findOrFail($id);
    }

    //Lấy danh sách trạng thái đơn hàng
    public function getAllStatus(){
        return OrderStatus::all();
    }

    //Lấy danh sách trạng thái thanh toán
    public function getAllPaymentStatus(){
        return PaymentStatus::all();
    }

    public function findUpdateStatus($id, $data){
        $order= Order::findOrFail($id);

        return $order->update($data);
    }

    public function getAllOrderUser(){
        return Order::with([
            'status', 
            'orderDetails.variants.product', 
            'orderDetails.variants.color',   
            'orderDetails.variants.size'])
            ->where('user_id', Auth::id())->latest()->get();
    }
}