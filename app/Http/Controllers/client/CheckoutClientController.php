<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutClientController extends Controller
{
    public function index(){
        $checkoutData= session('checkout_data');
        return view('client.checkout.index', $checkoutData);
    }
}
