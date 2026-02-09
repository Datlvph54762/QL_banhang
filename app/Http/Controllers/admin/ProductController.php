<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService){
        $this->productService= $productService;
    }

    public function index(){
        $products= $this->productService->getAllProduct();
        
        return view('admin.products.index', compact('products'));
    }
}
