<?php

namespace App\Services\client;

use App\Repositories\OrderRepository;

class AccountClientService{
    protected $orderRepo;

    public function __construct(OrderRepository $orderRepository){
        $this->orderRepo= $orderRepository;
    }

    public function getAllOrderUser(){
        return $this->orderRepo->getAllOrderUser();
    }
}