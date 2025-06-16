<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class AdminCustomerController extends Controller
{
    public function index()
    {
        $customer = Customer::with('order')->get();
        return view('admin.customer.index',['customers'=>$customer]);
    }
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return back()->with('delete','Customer Deleted Successfully');
    }
    
}
