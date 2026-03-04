<?php

use App\Http\Controllers\admin\account\RoleAdminController;
use App\Http\Controllers\admin\account\StaffAdminController;
use App\Http\Controllers\admin\CategoryController;
    use App\Http\Controllers\admin\OrderController;
    use App\Http\Controllers\admin\ProductController;
    use App\Http\Controllers\admin\ProductVariant;
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\admin\account\UserAdminController;
use Database\Factories\UserFactory;
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
    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');

    //Product
    Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::get('/products/{id}/show', [ProductController::class, 'show'])->name('admin.products.show');
    Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('admin.products.update');
    
    //Variant   
    Route::get('/products/{id}/variants', [ProductVariant::class, 'index'])->name('admin.products.productVariants.index');
    Route::get('/products/{id}/variants/create', [ProductVariant::class, 'create'])->name('admin.products.productVariants.create');
    Route::post('/store', [ProductVariant::class, 'store'])->name('admin.products.productVariants.store');
    Route::get('/variants/{id}/edit', [ProductVariant::class, 'edit'])->name('admin.products.productVariants.edit');
    Route::put('/variants/{id}', [ProductVariant::class, 'update'])->name('admin.products.productVariants.update');
    
    //Order
    Route::get('/orders',[OrderController::class, 'index'])->name('admin.orders.index');

    //Account
    Route::get('/users', [UserAdminController::class,'index'])->name('admin.accounts.users.index');

    Route::get('/staffs', [StaffAdminController::class,'index'])->name('admin.accounts.staffs.index');
    Route::get('/staffs/create', [StaffAdminController::class,'create'])->name('admin.accounts.staffs.create');
    Route::post('/store', [StaffAdminController::class,'store'])->name('admin.accounts.staffs.store');
    Route::get('/staffs/{id}/edit', [StaffAdminController::class,'edit'])->name('admin.accounts.staffs.edit');
    Route::put('/staffs/{id}', [StaffAdminController::class,'update'])->name('admin.accounts.staffs.update');

    //Role-permission
    Route::get('/roles-permission', [RoleAdminController::class,'index'])->name('admin.accounts.roles-permission.index');
    Route::get('/roles-permission/create', [RoleAdminController::class,'create'])->name('admin.accounts.roles-permission.create');
    

