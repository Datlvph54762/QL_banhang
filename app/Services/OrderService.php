<?php

namespace App\Services;
use App\Repositories\OrderRepository;

class OrderService
{
    protected $orderrepo;

    public function __construct(OrderRepository $orderRepo)
    {
        $this->orderrepo = $orderRepo;
    }

    public function getAllOrder()
    {
        return $this->orderrepo->getAll();
    }

    public function getOrderDetail($id)
    {
        return $this->orderrepo->findOrder($id);
    }

    //Lấy danh sách trạng thái đơn hàng
    public function getAllStatus(){
        return $this->orderrepo->getAllStatus();
    }

    //Lấy danh sách trạng thái Thanh toán
    public function getAllPaymentStatus(){
        return $this->orderrepo->getAllPaymentStatus();
    }
}