<?php

namespace App\Services;
use App\Repositories\OrderRepository;

class OrderService{
    protected $orderrepo;

    public function __construct(OrderRepository $orderRepo){
        $this->orderrepo= $orderRepo;
    }

    public function getAllOrder(){
        return $this->orderrepo->getAll();
    }
}