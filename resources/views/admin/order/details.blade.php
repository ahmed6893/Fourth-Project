@extends('admin.master')
@section('body')

    <!--app-content open-->
    <div class="app-content main-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">


                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <div>
                        <h1 class="page-title">Order Detail</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Apps</li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Orders Detail</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->

                <!--ROW OPENED-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="card-header border-bottom d-flex justify-content-between">
                                    <h3 class="card-title">Order Detail Info</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                            @if(session('delete'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>{{ session('delete') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="card">
                            <div class="card-body project-list-table-container">
                                <div class="table-responsive">
                                    <table class="display table table-bordered text-dark" style="min-width:845px">
                                        <tr>
                                            <th>Customer Info</th>
                                            <td>
                                                <b>Name:</b>{{ $order->customer->first_name . $order->customer->last_name }}<br>
                                                <b>Phone:</b>{{ $order->customer->phone }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Order ID</th>
                                            <td>{{ $order->id }}</td>
                                        </tr>
                                        <tr>
                                            <th>Order Date</th>
                                            <td>{{ $order->order_date }}</td>
                                        </tr>
                                        <tr>
                                            <th>Order Status</th>
                                            <td>{{ $order->order_status }}</td>
                                        </tr>
                                        <tr>
                                            <th>Order Total</th>
                                            <td>{{ $order->order_total }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tax Total</th>
                                            <td>{{ $order->tax_total }}</td>
                                        </tr>
                                        <tr>
                                            <th>Shipping Total</th>
                                            <td>{{ $order->shipping_total }}</td>
                                        </tr>
                                        <tr>
                                            <th>Delivery Address</th>
                                            <td>{{ $order->delivery_address }}</td>
                                        </tr>
                                        <tr>
                                            <th>Delivery Status</th>
                                            <td>{{ $order->delivery_status }}</td>
                                        </tr>
                                        <tr>
                                            <th>Delivery Date</th>
                                            <td>{{ $order->delivery_date }}</td>
                                        </tr>
                                        <tr>
                                            <th>Payment Method</th>
                                            <td>{{ $order->payment_method }}</td>
                                        </tr>
                                        <tr>
                                            <th>Payment Status</th>
                                            <td>{{ $order->payment_status }}</td>
                                        </tr>
                                        <tr>
                                            <th>Payment Date</th>
                                            <td>{{ $order->payment_date }}</td>
                                        </tr>
                                        <tr>
                                            <th>Currency</th>
                                            <td>{{ $order->currency }}</td>
                                        </tr>
                                        <tr>
                                            <th>Transaction ID</th>
                                            <td>{{ $order->transaction_id }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body project-list-table-container">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped align-middle text-center">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Product Name</th>
                                                <th>Product Code</th>
                                                <th>Product Size</th>
                                                <th>Product Color</th>
                                                <th>Unit Price</th>
                                                <th>Quantity</th>
                                                <th>Total Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($order->orderDetails as $orderDetail)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $orderDetail->product_name }}</td>
                                                    <td>{{ $orderDetail->product_code }}</td>
                                                    <td>{{ $orderDetail->product_size }}</td>
                                                    <td>{{ $orderDetail->product_color }}</td>
                                                    <td>{{ number_format($orderDetail->product_price, 2) }}</td>
                                                    <td>{{ $orderDetail->product_qty }}</td>
                                                    <td>{{ number_format($orderDetail->product_qty * $orderDetail->product_price, 2) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><!-- COL END -->
                </div>
                <!--ROW CLOSED-->


            </div>
        </div>
    </div>
    <!-- CONTAINER CLOSED -->
@endsection
