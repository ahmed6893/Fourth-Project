<?php

namespace App\Http\Controllers;

use App\Models\Courier;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetails;

use function PHPUnit\Framework\returnSelf;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with("orderDetails")->get();
        return view('admin.order.index',['orders'=> $orders]);
    }
    public function details($id)
    {
        return view('admin.order.details',['order'=> Order::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view('admin.order.edit',['order'=> Order::with('customer')->findOrFail($id),
                                                      'couriers'=>Courier::all()
                                                    ]);
    }
    public function invoice($id)
    {
        return view('admin.order.invoice',['order'=> Order::findOrFail($id)]);
    }
    public function downloadInvoice($id)
    {
        return view('admin.order.download-invoice',['order'=> Order::findOrFail($id)]);
    }


    public $order;
    public function update(Request $request,$id)
    {
        $request->validate([
                    'order_status' => 'required|in:pending,processing,complete,cancel',
                    'delivery_address' =>'required_if:order_status,processing',
                    'courier_id' => 'required_if:order_status,processing|exists:couriers,id'
        ]);

        $this->order = Order::findOrFail($id);
        $this->order->delivery_address = $request->delivery_address;

        if($request->order_status == 'pending' || $request->order_status == 'cancel'){
            $this->order->order_status    = $request->order_status;
            $this->order->delivery_status = $request->order_status;
            $this->order->payment_status  = $request->order_status;
        }
        elseif($request->order_status == 'processing'){
            $this->order->order_status    = $request->order_status ;
            $this->order->delivery_status = $request->order_status;
            $this->order->payment_status  = $request->order_status;
            $this->order->courier_id      = $request->courier_id;
        }
        elseif($request->order_status == 'complete'){
            $this->order->order_status       = $request->order_status;
            $this->order->delivery_status    = $request->order_status;
            $this->order->payment_status     = $request->order_status;
            $this->order->delivery_date      = date('Y-m-d');
            $this->order->delivery_timestamp = strtotime(date('Y-m-d'));
            $this->order->payment_date       = date('Y-m-d');
            $this->order->payment_timestamp  = strtotime(date('Y-m-d'));
            $this->order->courier_id         = $request->courier_id;
        }
        $this->order->save();
        return redirect('/order')->with('success','Order Updated Successfully');
    }

    public $orderDetails;
    public function destroy($id)
    {
       $this->orderDetails = OrderDetails::where('order_id',$id)->get();
       foreach ($this->orderDetails as $orderDetail) {
        $orderDetail->delete();
       }
        Order::find($id)->delete();
        return redirect('')->with('delete','');
    }
}
