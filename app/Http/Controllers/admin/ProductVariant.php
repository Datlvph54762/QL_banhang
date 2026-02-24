<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\ColorService;
use App\Services\ProductVariantService;
use App\Services\SizeService;
use Illuminate\Http\Request;

class ProductVariant extends Controller
{
    protected $productVarriantService;
    protected $colorService;
    protected $sizeService;

    public function __construct(ProductVariantService $productVariantService, ColorService $colorService, SizeService $sizeService)
    {
        $this->productVarriantService = $productVariantService;
        $this->colorService = $colorService;
        $this->sizeService = $sizeService;
    }

    public function index($id)
    {
        $productVariant = $this->productVarriantService->getByProduct($id);

        return view('admin.products.productVariants.index', compact('productVariant'));
    }

    public function create(){
        $colors= $this->colorService->getAllColor();
        $sizes= $this->sizeService->getAllSize();
        return view('admin.products.productVariants.create', compact('colors','sizes'));
    }
}
