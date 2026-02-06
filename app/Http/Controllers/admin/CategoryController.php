<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService= $categoryService;
    }

    public function index(){
        $categories = $this->categoryService->getAllCategory();

        return view('admin.categories.index', compact('categories'));
    }
}
