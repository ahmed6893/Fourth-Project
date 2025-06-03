<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetails;
use Session;
use Cart;
use Illuminate\Support\Facades\Mail as FacadesMail;
use Mail;

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

    public $order , $orderDetail,$sslCommerze ;
    public function newOrder(Request $request)
    {
       if($request->payment_method == 'cash'){
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
        $title = 'Thank You For Your Order';
        $body = 'Wellcome to our Website';

        Mail::to(Customer::find($this->order->customer_id)->email)->send(new OrderMail($title,$body));
        return redirect('/complete-order')->with('success','You order save successfully.Please wait we will contact with you soon');
       }else{
        $customer=Customer::find(Session::get('customerId'));
        $this->sslCommerze = new SslCommerzPaymentController();
        $this->sslCommerze->index($request ,$customer);
       }
    }

    public function completeOrder()
    {
        return view('website.checkout.complete-order');

    }
}
