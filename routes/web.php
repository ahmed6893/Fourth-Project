<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstoreController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;


Route::get('/',[EstoreController::class,'index'])->name('home');
Route::get('/estore',[EstoreController::class,'product'])->name('estore');
Route::get('/product/details',[EstoreController::class,'productDetails'])->name('product.details');

Route::get('/product/cart',[CartController::class,'cart'])->name('product.cart');

Route::get('/product/checkout',[CheckoutController::class,'checkout'])->name('product.checkout');


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {

    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');

});
