<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Session;

class CustomerDashboardController extends Controller
{
	public function index()
{
    $orders = Order::with(['customer', 'orderDetails'])
        ->where('customer_id', Session::get('customerId'))
        ->get();

    return view('website.customer.index', compact('orders'));
}


    public function order()
    {
        return view('website.customer.order');
    }
    public function information()
    {
        return view('website.customer.information');
    }
    public function password()
    {
        return view('website.customer.password');
    }
}
