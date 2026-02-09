<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('login.login');
// });

Route::get('/', [AuthController::class,'showLogin'])->name('login');
Route::post('/', [AuthController::class,'login']);

Route::get('/dashboard', function () {
    return view('Admin.dashboard.index');
})->name('admin.dashboard');

//Categories
// Route::resource('categories', CategoryController::class);
Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.index');

//Product
Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');

//Order
Route::get('/orders',[OrderController::class, 'index'])->name('admin.orders.index');