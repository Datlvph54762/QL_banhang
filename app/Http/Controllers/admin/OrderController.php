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

    public function show($id){
        $order = $this->orderService->getOrderDetail($id);
        $statuses= $this->orderService->getAllStatus();
        $paymentStatuses= $this->orderService->getAllPaymentStatus();

        return view('admin.orders.show', compact('order','statuses','paymentStatuses'));
    }

    public function update(Request $request,$id ){

        $data= $request->only(['status_id','payment_status_id']);

        $this->orderService->updateStatus($id, $data);

        return back()->with('success','Cập nhật trạng thái thành công');
    }
}