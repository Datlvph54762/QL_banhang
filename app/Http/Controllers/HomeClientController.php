<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Services\HomeClientService;
use Illuminate\Http\Request;

class HomeClientController extends Controller
{
    protected $homeService;

    public function __construct(HomeClientService $homeService  ){
        $this->homeService= $homeService;
    }

    public function index(){
        $products= $this->homeService->getAllHome();

        return view('client.home', compact('products'));
    }
}
