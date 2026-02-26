<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\ColorService;
use App\Services\ProductService;
use App\Services\ProductVariantService;
use App\Services\SizeService;
use Illuminate\Http\Request;

class ProductVariant extends Controller
{
    protected $productVariantService;
    protected $colorService;
    protected $sizeService;

    protected $productService;

    public function __construct(ProductVariantService $productVariantService, ColorService $colorService, SizeService $sizeService, ProductService $productService)
    {
        $this->productVariantService = $productVariantService;
        $this->colorService = $colorService;
        $this->sizeService = $sizeService;
        $this->productService = $productService;
    }

    public function index($id)
    {
        $productVariant = $this->productVariantService->getByProduct($id);
        $product = $this->productService->findId($id);

        return view('admin.products.productVariants.index', compact('productVariant', 'product'));
    }

    public function create($id)
    {
        $product = $this->productService->findId($id);
        $colors = $this->colorService->getAllColor();
        $sizes = $this->sizeService->getAllSize();
        return view('admin.products.productVariants.create', compact('product', 'colors', 'sizes'));
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'product_id' => 'required|exists:products,id',
                'color_id' => 'required|exists:colors,id',
                'size_id' => 'required|exists:sizes,id',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
                'quantity' => 'required|integer|min:0',
                'price' => 'required|numeric|min:0',
                'sale' => 'nullable|numeric|min:0|lte:price',
            ],
            [
                'price.required' => 'Giá không được để trống.',
                'price.numeric' => 'Giá phải là số.',
                'price.min' => 'Giá phải >= 0.',
                'sale.numeric' => 'Giá khuyến mãi phải là số.',
                'sale.min' => 'Giá khuyến mãi phải >= 0.',
                'sale.lt' => 'Giá khuyến mãi phải nhỏ hơn giá gốc.',
                'quantity.required' => 'Số lượng không được để trống.',
                'quantity.numeric' => 'Số lượng phải là số.',
                'quantity.min' => 'Số lượng phải >= 0.',
                'image.required' => 'Hình ảnh không được để trống.',
                'image.image' => 'Hình ảnh không hợp lệ.',
                'image.max' => 'Kích thước hình ảnh không được vượt quá 2MB.'
            ]
        );

        $this->productVariantService->create($data);

        return redirect()->route('admin.products.productVariants.index', $data['product_id'])->with('success', 'Thêm biến thể thành công');
    }

    public function edit($id)
    {
        $productVariant = $this->productVariantService->findId($id);
        $colors = $this->colorService->getAllColor();
        $sizes = $this->sizeService->getAllSize();

        return view('admin.products.productVariants.edit', compact('productVariant', 'colors', 'sizes'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate(
            [
                'product_id' => 'required|exists:products,id',
                'color_id' => 'required|exists:colors,id',
                'size_id' => 'required|exists:sizes,id',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
                'quantity' => 'required|integer|min:0',
                'price' => 'required|numeric|min:0',
                'sale' => 'nullable|numeric|min:0|lte:price',
            ],
            [
                'price.required' => 'Giá không được để trống.',
                'price.numeric' => 'Giá phải là số.',
                'price.min' => 'Giá phải từ 0 trở lên.',
                'sale.numeric' => 'Giá khuyến mãi phải là số.',
                'sale.min' => 'Giá khuyến mãi phải từ 0 trở lên.',
                'sale.lte' => 'Giá khuyến mãi không được lớn hơn giá gốc.',
                'quantity.required' => 'Số lượng không được để trống.',
                'quantity.integer' => 'Số lượng phải là số nguyên.',
                'quantity.min' => 'Số lượng không được âm.',
                'image.image' => 'File tải lên phải là hình ảnh.',
                'image.mimes' => 'Ảnh phải có định dạng: jpeg, png, jpg, webp.',
                'image.max' => 'Dung lượng ảnh tối đa là 2MB.'
            ]
        );
        
        $this->productVariantService->update($id, $data);
        
        return redirect()->route('admin.products.productVariants.index', $data['product_id'])
            ->with('success', 'Cập nhật biến thể thành công!!');
    }
}
