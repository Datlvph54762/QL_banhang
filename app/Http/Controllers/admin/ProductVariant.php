<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\ProductVariantService;
use Illuminate\Http\Request;

class ProductVariant extends Controller
{
    protected $productVarriantService;

    public function __construct(ProductVariantService $productVariantService)
    {
        $this->productVarriantService = $productVariantService;
    }

    public function index($id)
    {
        $productVariant = $this->productVarriantService->getByProduct($id);

        return view('admin.products.productVariants.index', compact('productVariant'));
    }
}
