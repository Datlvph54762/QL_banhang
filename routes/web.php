<?php

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
