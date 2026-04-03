<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Services\client\AccountClientService;
use Illuminate\Http\Request;

class AccountClientController extends Controller
{
    protected $accountClientService;

    public function __construct(AccountClientService $accountClientService){
        $this->accountClientService= $accountClientService;
    }

    public function index(){
        $orders= $this->accountClientService->getAllOrderUser();

        return view('client.accounts.orders.index', compact('orders'));
    }
}
