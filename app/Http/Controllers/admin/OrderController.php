<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService){
        $this->orderService= $orderService;
    }

    public function index(){
        $orders= $this->orderService->getAllOrder();

        return view('admin.orders.index', compact('orders'));
    }
}
