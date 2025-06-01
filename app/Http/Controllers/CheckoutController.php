<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetails;
use Session;
use Cart;

class CheckoutController extends Controller
{
    public function checkout()
    {
        if(count(Cart::content()) == 0)
        {
            return redirect()->with('message','Your Shopping Cart Is Empty . ');
        }
        if (Session::has("customerId")) {
            return view('website.checkout.index');
        }
        Session::put('checkout' , 'checkout');
        return redirect('/customer/login');

    }

    public $order , $orderDetail ;
    public function newOrder(Request $request)
    {
        $this->order = new Order();
        $this->order->customer_id = Session::get('customerId');
        $this->order->order_total = Session::get('order_total');
        $this->order->tax_total = Session::get('tax_total');
        $this->order->shipping_total = Session::get('shipping_total');
        $this->order->order_date = date('Y-m-d');
        $this->order->order_timestamp = strtotime(date('Y-m-d'));
        $this->order->delivery_address = $request->delivery_address;
        $this->order->payment_method = $request->payment_method;
        $this->order->save();

        foreach(Cart::content() as $item){
            $this->orderDetail = new OrderDetails();
            $this->orderDetail->order_id = $this->order->id;
            $this->orderDetail->product_id = $item->id;
            $this->orderDetail->product_name = $item->name;
            $this->orderDetail->product_code = $item->options->code;
            $this->orderDetail->product_price = $item->price;
            $this->orderDetail->product_qty  = $item->qty;
            $this->orderDetail->product_color =$item->options->color;
            $this->orderDetail->product_size =$item->options->size;
            $this->orderDetail->product_image = $item->options->image;
            $this->orderDetail->save();

            Cart::remove($item->rowId);
        }
        return redirect('/complete-order')->with('success','You order save successfully.Please wait we will contact with you soon');
    }

    public function completeOrder()
    {
        return view('website.checkout.complete-order');

    }
}
