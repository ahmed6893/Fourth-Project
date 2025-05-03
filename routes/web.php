<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstoreController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\ProductController;

Route::get('/',               [EstoreController::class,'index'])            ->name('home');
Route::get('/estore',         [EstoreController::class,'product'])          ->name('estore');
Route::get('/product/details',[EstoreController::class,'productDetails'])   ->name('product.details');

Route::get('/product/cart',[CartController::class,'cart'])->name('product.cart');

Route::get('/product/checkout',[CheckoutController::class,'checkout'])->name('product.checkout');

Route::get('/customer/login',   [CustomerController::class,'login'])    ->name('customer.login');
Route::get('/product/checkout', [CustomerController::class,'register']) ->name('customer.register');


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {

    Route::get('/dashboard', [DashboardController::class,'index']) ->name('dashboard');

    Route::resource('category',     CategoryController::class);
    Route::resource('sub-category', SubCategoryController::class);
    Route::resource('brand',        BrandController::class);
    Route::resource('unit',         UnitController::class);
    Route::resource('color',        ColorController::class);
    Route::resource('size',         SizeController::class);
    Route::resource('courier',      CourierController::class);
    Route::resource('product',      ProductController::class);

});
