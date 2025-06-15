<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
        return view('website.customer.password',['customer'=>Customer::find(Session::get('customerId'))]);
    }
    public function update(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'current_password' => 'nullable|string',
            'new_password' => 'nullable|min:6|confirmed',
        ]);

        $customer = Customer::find(Session::get('customerId'));

        $customer->first_name = $request->first_name ;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;

        if($request->filled('current_password') && $request->filled('new_password') ){
            if(!Hash::check($request->current_password , $customer->password)){
                return back()->with('error','Current password is correct');
            }
            $customer->password =Hash::make($request->new_password);
        }

        $customer->save();
        return back()->with('success','Profile Updated Successfully ');
    }
}
