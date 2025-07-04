<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Library\SslCommerz\SslCommerzNotification;
use Session;
use App\Models\Order;
use Cart;
use App\Models\OrderDetails;

class SslCommerzPaymentController extends Controller
{

    public function exampleEasyCheckout()
    {
        return view('exampleEasycheckout');
    }

    public function exampleHostedCheckout()
    {
        return view('exampleHosted');
    }

    public $orderDetail;
    public function index(Request $request ,$customer)
    {
        # Here you have to receive all the order data to initate the payment.
        # Let's say, your oder transaction informations are saving in a table called "orders"
        # In "orders" table, order unique identity is "transaction_id". "status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.

        $post_data = array();
        $post_data['total_amount'] = Session::get('order_total'); # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = uniqid(); // tran_id must be unique

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = $customer->first_name.$customer->last_name;
        $post_data['cus_email'] = $customer->email;
        $post_data['cus_add1'] = 'Customer Address';
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = "";
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = "";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = $customer->phone;
        $post_data['cus_fax'] = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Store Test";
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = $customer->id;
        $post_data['value_b'] = $customer->name;
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";

        #Before  going to initiate the payment order status need to insert or update as Pending.
        $update_product = DB::table('orders')
            ->where('transaction_id', $post_data['tran_id'])
            ->updateOrInsert([
                'customer_id'=>$customer->id,
                'order_total'=>Session::get('order_total'),
                'tax_total' => Session::get('tax_total'),
                'shipping_total' => Session::get('shipping_total'),
                'order_date' => date('Y-m-d'),
                'order_timestamp' => strtotime(date('Y-m-d')),
                'delivery_address' => $request->delivery_address,
                'payment_method' => $request->payment_method,
                'transaction_id' => $post_data['tran_id'],
                'currency' => $post_data['currency']
            ]);
            $orderId =Order::orderBy('id','desc')->first()->id;
            foreach(Cart::content() as $item)
            {
            $this->orderDetail = new OrderDetails();
            $this->orderDetail->order_id = $orderId;
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

        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'hosted');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }

    }

    public function payViaAjax(Request $request)
    {

        # Here you have to receive all the order data to initate the payment.
        # Lets your oder trnsaction informations are saving in a table called "orders"
        # In orders table order uniq identity is "transaction_id","status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.

        $post_data = array();
        $post_data['total_amount'] = '10'; # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = uniqid(); // tran_id must be unique

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = 'Customer Name';
        $post_data['cus_email'] = 'customer@mail.com';
        $post_data['cus_add1'] = 'Customer Address';
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = "";
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = "";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = '8801XXXXXXXXX';
        $post_data['cus_fax'] = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Store Test";
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";


        #Before  going to initiate the payment order status need to update as Pending.
        $update_product = DB::table('orders')
            ->where('transaction_id', $post_data['tran_id'])
            ->updateOrInsert([
                'name' => $post_data['cus_name'],
                'email' => $post_data['cus_email'],
                'phone' => $post_data['cus_phone'],
                'amount' => $post_data['total_amount'],
                'status' => 'Pending',
                'address' => $post_data['cus_add1'],
                'transaction_id' => $post_data['tran_id'],
                'currency' => $post_data['currency']
            ]);

        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'checkout', 'json');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }

    }

public function success(Request $request)
{
    Session::put('customerId', $request->input('value_a'));
    Session::put('customerName', $request->input('value_b'));

    echo "Transaction is Successful<br>";

    $tran_id = $request->input('tran_id');
    $amount = $request->input('amount');
    $currency = $request->input('currency');

    $sslc = new SslCommerzNotification();

    $order_details = DB::table('orders')
        ->where('transaction_id', $tran_id)
        ->select('transaction_id', 'order_status', 'currency', 'order_total')
        ->first();

    // Safety check
    if ($order_details) {
        if ($order_details->order_status == 'pending') {
            $validation = $sslc->orderValidate($request->all(), $tran_id, $amount, $currency);

            if ($validation) {
                DB::table('orders')
                    ->where('transaction_id', $tran_id)
                    ->update(['order_status' => 'processing']);

                echo "Transaction is successfully Completed<br>";
                return redirect('/complete-order')->with('success', 'Your order has been placed successfully. We will contact you soon.');
            } else {
                echo "Validation Failed<br>";
            }
        } elseif ($order_details->order_status == 'processing' || $order_details->order_status == 'complete') {
            echo "Transaction already completed<br>";
            return redirect('/complete-order')->with('success', 'Your order has been placed successfully. We will contact you soon.');
        } else {
            echo "Invalid Order Status<br>";
        }
    } else {
        echo "Invalid Transaction ID<br>";
    }
}

    public function fail(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $order_details = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'order_status', 'currency', 'order_total')->first();

        if ($order_details->order_status == 'Pending') {
            $update_product = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->update(['order_status' => 'Failed']);
            echo "Transaction is Falied";
        } else if ($order_details->order_status == 'Processing' || $order_details->order_status == 'Complete') {
            echo "Transaction is already Successful";
        } else {
            echo "Transaction is Invalid";
        }

    }

    public function cancel(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $order_details = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'order_status', 'currency', 'order_total')->first();

        if ($order_details->order_status == 'Pending') {
            $update_product = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->update(['order_status' => 'Canceled']);
            echo "Transaction is Cancel";
        } else if ($order_details->order_status == 'Processing' || $order_details->order_status == 'Complete') {
            echo "Transaction is already Successful";
        } else {
            echo "Transaction is Invalid";
        }


    }

    public function ipn(Request $request)
    {
        #Received all the payement information from the gateway
        if ($request->input('tran_id')) #Check transation id is posted or not.
        {

            $tran_id = $request->input('tran_id');

            #Check order status in order tabel against the transaction id or order id.
            $order_details = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->select('transaction_id', 'order_status', 'currency', 'order_total')->first();

            if ($order_details->order_status == 'Pending') {
                $sslc = new SslCommerzNotification();
                $validation = $sslc->orderValidate($request->all(), $tran_id, $order_details->order_total, $order_details->currency);
                if ($validation == TRUE) {
                    /*
                    That means IPN worked. Here you need to update order status
                    in order table as Processing or Complete.
                    Here you can also sent sms or email for successful transaction to customer
                    */
                    $update_product = DB::table('orders')
                        ->where('transaction_id', $tran_id)
                        ->update(['order_status' => 'Processing']);

                    echo "Transaction is successfully Completed";
                }
            } else if ($order_details->order_status == 'Processing' || $order_details->order_status == 'Complete') {

                #That means Order status already updated. No need to udate database.

                echo "Transaction is already successfully Completed";
            } else {
                #That means something wrong happened. You can redirect customer to your product page.

                echo "Invalid Transaction";
            }
        } else {
            echo "Invalid Data";
        }
    }

}
