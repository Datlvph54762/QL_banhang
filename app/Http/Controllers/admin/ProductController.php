<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;
    protected $categoryService;

    public function __construct(ProductService $productService, CategoryService $categoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $products = $this->productService->getAllProduct();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = $this->categoryService->getAllCategory();

        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'product_code' => 'required|string|max:50|unique:products,product_code',
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description' => 'nullable|string|max:2000',
            'material' => 'required|string|max:255',
        ], [
            'category_id.required' => 'Vui lòng chọn danh mục',
            'category_id.exists' => 'Danh mục không tồn tại',
            'product_code.required' => 'Mã sản phẩm không được để trống',
            'product_code.unique' => 'Mã sản phẩm đã tồn tại',
            'material.required' => 'Chất liệu sản phẩm không được để trống',
            'name.required' => 'Tên sản phẩm không được để trống',
            'image.image' => 'File phải là hình ảnh',
            'image.max' => 'Ảnh tối đa 2MB',
        ]);

        $this->productService->create($data);

        return redirect()->route('admin.products.index')->with('success', 'Thêm sản phẩm thành công');
    }

    public function edit($id)
    {
        $product = $this->productService->findId($id);
        $categories = $this->categoryService->getAllCategory();

        return view('admin.products.edit', compact('categories', 'product'));
    }

    public function update(Request $request, $id){
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'product_code' => 'required|string',
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description' => 'nullable|string|max:2000',
            'material' => 'required|string|max:255',
        ], [
            'category_id.required' => 'Vui lòng chọn danh mục',
            'category_id.exists' => 'Danh mục không tồn tại',
            'product_code.required' => 'Mã sản phẩm không được để trống',
            'material.required' => 'Chất liệu sản phẩm không được để trống',
            'name.required' => 'Tên sản phẩm không được để trống',
            'image.image' => 'File phải là hình ảnh',
            'image.max' => 'Ảnh tối đa 2MB',
        ]);
        
        $this->productService->update($id,$data);
        

        return redirect()->route('admin.products.index')->with('success', 'Cập nhật sp thành công');
    }
}
