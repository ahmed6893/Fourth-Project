<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;
use Session;

class CustomerDashboardController extends Controller
{
	public function index()
{
    return view('website.customer.index',['customer'=>Customer::find(Session::get('customerId'))]);
}


    public function order()
    {
        $orders = Order::with(['customer', 'orderDetails'])
        ->where('customer_id', Session::get('customerId'))
        ->get();
        return view('website.customer.order',compact('orders'));
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
