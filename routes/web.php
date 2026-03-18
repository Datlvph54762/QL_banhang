<?php

use App\Http\Controllers\admin\account\RoleAdminController;
use App\Http\Controllers\admin\account\StaffAdminController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ProductVariant;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\admin\account\UserAdminController;
use App\Http\Controllers\client\AuthClientController;
use App\Http\Controllers\client\CartClientController;
use App\Http\Controllers\client\ProductClientController;
use App\Http\Controllers\HomeClientController;
use Database\Factories\UserFactory;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->group(function () {

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/dashboard', function () {
        return view('Admin.dashboard.index');
    })->name('admin.dashboard');

    // Quản lý Danh mục (Categories)
    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.categories.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('admin.categories.create');
        Route::post('/', [CategoryController::class, 'store'])->name('admin.categories.store');
        Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
        Route::put('/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');
    });

    // Quản lý Sản phẩm (Products & Variants)
    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('admin.products.index');
        Route::get('/create', [ProductController::class, 'create'])->name('admin.products.create');
        Route::post('/', [ProductController::class, 'store'])->name('admin.products.store');
        Route::get('/{id}/show', [ProductController::class, 'show'])->name('admin.products.show');
        Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
        Route::put('/{id}', [ProductController::class, 'update'])->name('admin.products.update');

        // Biến thể sản phẩm (Variants)
        Route::get('/{id}/variants', [ProductVariant::class, 'index'])->name('admin.products.productVariants.index');
        Route::get('/{id}/variants/create', [ProductVariant::class, 'create'])->name('admin.products.productVariants.create');
        Route::post('/variants/store', [ProductVariant::class, 'store'])->name('admin.products.productVariants.store');
        Route::get('/variants/{id}/edit', [ProductVariant::class, 'edit'])->name('admin.products.productVariants.edit');
        Route::put('/variants/{id}', [ProductVariant::class, 'update'])->name('admin.products.productVariants.update');
    });

    // Quản lý Đơn hàng (Orders)
    Route::get('/orders', [OrderController::class, 'index'])->name('admin.orders.index');

    // Quản lý Tài khoản & Phân quyền (Accounts)
    Route::prefix('accounts')->group(function () {
        // Users & Staffs
        Route::get('/users', [UserAdminController::class, 'index'])->name('admin.accounts.users.index');
        Route::prefix('staffs')->group(function () {
            Route::get('/', [StaffAdminController::class, 'index'])->name('admin.accounts.staffs.index');
            Route::get('/create', [StaffAdminController::class, 'create'])->name('admin.accounts.staffs.create');
            Route::post('/store', [StaffAdminController::class, 'store'])->name('admin.accounts.staffs.store');
            Route::get('/{id}/edit', [StaffAdminController::class, 'edit'])->name('admin.accounts.staffs.edit');
            Route::put('/{id}', [StaffAdminController::class, 'update'])->name('admin.accounts.staffs.update');
        });

        // Roles & Permissions
        Route::prefix('roles-permission')->group(function () {
            Route::get('/', [RoleAdminController::class, 'index'])->name('admin.accounts.roles-permission.index');
            Route::get('/create', [RoleAdminController::class, 'create'])->name('admin.accounts.roles-permission.create');
            Route::post('/store', [RoleAdminController::class, 'store'])->name('admin.accounts.roles-permission.store');
            Route::get('/{id}/edit', [RoleAdminController::class, 'edit'])->name('admin.accounts.roles-permission.edit');
            Route::put('/{id}', [RoleAdminController::class, 'update'])->name('admin.accounts.roles-permission.update');
        });
    });
});



Route::get('/',[HomeClientController::class, 'index'])->name('client.home');

Route::get('/client-login', [AuthClientController::class, 'showLoginClient'])->name('client.login');
Route::post('/client-login', [AuthClientController::class, 'loginClient']);
Route::get('/register', [AuthClientController::class, 'showRegister'])->name('client.register');
Route::post('/register', [AuthClientController::class, 'createUser'])->name('client.register');
Route::post('/client-logout', [AuthClientController::class, 'logoutClient'])->name('client.logout');

Route::get('/product-list',[ProductClientController::class, 'index'])->name('client.products.index');
Route::get('/product/{id}',[ProductClientController::class, 'showProduct'])->name('product.show');

Route::get('/cart-list',[CartClientController::class, 'index'])->name('client.carts.index');