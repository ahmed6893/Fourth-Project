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
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\CustomerDashboardController;
use App\Http\Controllers\AdminCustomerController;
use App\Http\Controllers\UserController;

Route::get('/',                        [EstoreController::class,'index'])             ->name('home');
Route::get('/estore/{id}',             [EstoreController::class,'product'])           ->name('estore');
Route::get('/sub-category-estore/{id}',[EstoreController::class,'subCategoryProduct'])->name('subCategory.estore');
Route::get('/product/details/{id}',    [EstoreController::class,'productDetails'])    ->name('product.details');

Route::get('/product/cart',           [CartController::class,'cart'])    ->name('product.cart');
Route::post('/cart/store',            [CartController::class,'store'])   ->name('cart.store');
Route::post('/cart/update/{rowId}',   [CartController::class,'update'])  ->name('cart.update');
Route::delete('/cart/destroy/{rowId}',[CartController::class,'destroy']) ->name('cart.destroy');


Route::get('/product/checkout',   [CheckoutController::class,'checkout'])->name('product.checkout');
Route::post('/checkout/new-order',[CheckoutController::class,'newOrder'])->name('new-order');

Route::get('/complete-order',[CheckoutController::class,'completeOrder'])->name('complete-order');

Route::get('/customer/login',    [CustomerController::class,'login'])            ->name('customer.login');
Route::post('/customer/login',   [CustomerController::class,'loginCheck'])      ->name('customer.login');
Route::get('/customer/logout',   [CustomerController::class,'logout'])          ->name('customer.logout');
Route::get('/customer/register', [CustomerController::class,'register'])        ->name('customer.register');
Route::post('/customer/register',[CustomerController::class,'saveNewCustomer'])->name('customer.register');

Route::middleware('auth:customer')->group(function(){
Route::get('/customer/dashboard',[CustomerDashboardController::class,'index']) ->name('customer.dashboard');
Route::get('/customer/order',[CustomerDashboardController::class,'order']) ->name('customer.order');
Route::get('/customer/updatePassword',[CustomerDashboardController::class,'password'])->name('customer.password');
Route::post('/customer/password',[CustomerDashboardController::class,'update'])->name('customer.update');
});

// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay',          [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail',    [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel',  [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END

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

    Route::resource('user',      UserController::class);



    Route::get('/order' ,                     [OrderController::class,'index'])          ->name('order');
    Route::get('/order/detail/{id}',          [OrderController::class,'details'])        ->name('order.details');
    Route::get('/order/edit/{id}',            [OrderController::class,'edit'])           ->name('order.edit');
    Route::put('/order/update/{id}',          [OrderController::class,'update'])         ->name('order.update');
    Route::get('/order/invoice/{id}',         [OrderController::class,'invoice'])        ->name('order.invoice');
    Route::get('/order/download-invoice/{id}',[OrderController::class,'downloadInvoice'])->name('order.download-invoice');
    Route::delete('/order/destroy/{id}',      [OrderController::class,'destroy'])        ->name('order.destroy');

    Route::get('/allcustomer',      [AdminCustomerController::class,'index'])        ->name('admin.customers');
    Route::get('/customer/destroy/{id}',      [AdminCustomerController::class,'destroy']) ->name('admin.customer.destroy');

});
