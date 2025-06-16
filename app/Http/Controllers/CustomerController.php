<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function login()
    {
        return view('website.customer.login');
    }
    public function register()
    {
        return view('website.customer.register');
    }

    public function saveNewCustomer(Request $request)
    {
        Customer::saveNewCustomer($request);
        return redirect('/')->with('success', 'Registration successful');
    }

    public $customer;
    public function loginCheck(Request $request)
    {
        $request->validate([
            'email_phone' => 'required',
            'password' => 'required',
        ]);

        $this->customer = Customer::where('email', $request->email_phone)->orWhere('phone', $request->email_phone)->first();
        if ($this->customer && password_verify($request->password, $this->customer->password)) {
                Auth::guard('customer')->login($this->customer);
                    Session::put('customerId', $this->customer->id);
                    Session::put('customerName', $this->customer->first_name . $this->customer->last_name);

                    if(Session::get('checkout')) {
                        Session::forget('checkout');
                        return redirect('/product/checkout');
                    }
                return redirect('/')->with('success','Login Successfull');
        }else{
            return back()->with('error','Please use valid email or phone');
        }

    }
    public function logout()
    {
        Session::forget('customerId');
        Session::forget('customerName');
        return redirect('/')->with('success','LogOut Success');
    }
}
