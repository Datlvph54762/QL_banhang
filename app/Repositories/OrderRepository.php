<?php

namespace App\Repositories;
use App\Models\Order;

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
            'orderDetails',
            'orderDetails.variants.product',
            'orderDetails.variants.color',
            'orderDetails.variants.size',
        )->findOrFail($id);
    }
}