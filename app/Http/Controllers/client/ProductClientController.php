<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Services\client\ProductClientService;
use Illuminate\Http\Request;

class ProductClientController extends Controller
{
    protected $productService;

    public function __construct(ProductClientService $productClientService){
        $this->productService= $productClientService;
    }

    public function index(Request $request){
        $search = $request->input('search');
        $products = $this->productService->getAllProduct($search);
    
        return view('client.products.index', compact('products'));
    }

    public function showProduct($id){
        $product= $this->productService->showProduct($id);

        return view('client.products.show', compact('product'));
    }
}
