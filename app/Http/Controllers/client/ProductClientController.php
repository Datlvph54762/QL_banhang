<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use App\Services\client\ProductClientService;
use Illuminate\Http\Request;

class ProductClientController extends Controller
{
    protected $productService;
    protected $categoryService;

    public function __construct(ProductClientService $productClientService, CategoryService $categoryService){
        $this->productService= $productClientService;
        $this->categoryService= $categoryService;
    }

    public function index(Request $request){
        $search = $request->input('search');
        $categoryId= $request->input('category_id');

        $products = $this->productService->getAllProduct($search, $categoryId);

        $categories= $this->categoryService->getAllCategory();
    
        return view('client.products.index', compact('products','categories'));
    }

    public function showProduct($id){
        $product= $this->productService->showProduct($id);

        return view('client.products.show', compact('product'));
    }
}
