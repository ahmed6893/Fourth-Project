<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #333;
        }

        h1, h3 {
            margin: 0;
            padding: 0;
        }

        .page-title {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .breadcrumb {
            list-style: none;
            padding: 0;
            margin: 0;
            font-size: 12px;
        }

        .breadcrumb li {
            display: inline;
            margin-right: 5px;
        }

        .card {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 20px;
        }

        .card-body {
            padding: 10px;
        }

        .card-footer {
            text-align: right;
            margin-top: 20px;
        }

        .clearfix::after {
            content: "";
            display: table;
            clear: both;
        }

        .float-start {
            float: left;
        }

        .float-end {
            float: right;
        }

        address {
            font-style: normal;
            line-height: 1.5;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        table th {
            background-color: #f5f5f5;
        }

        .text-center {
            text-align: center;
        }

        .text-end {
            text-align: right;
        }

        .fw-bold {
            font-weight: bold;
        }

        .h3 {
            font-size: 18px;
            font-weight: bold;
        }

        .h4 {
            font-size: 16px;
        }

        .mb-1 {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>

    <div class="card">
        <div class="card-body">
            <div class="clearfix">
                <div class="float-start">
                    <h3 class="card-title mb-1">Invoice #{{ $order->id }}</h3>
                </div>
                <div class="float-end">
                    <h3 class="card-title">Date: {{ $order->order_date }}</h3>
                </div>
            </div>
            <hr>
            <div class="row clearfix">
                <div class="float-start" style="width: 48%;">
                    <p class="h3">Invoice From:</p>
                    <address>
                        E store<br>
                        Uttera Ajompur<br>
                        Dhaka, Bangladesh<br>
                        Email: ahmedrifat@email.com
                    </address>
                </div>
                <div class="float-end" style="width: 48%; text-align: right;">
                    <p class="h3">Invoice To:</p>
                    <address>
                        Name:{{ $order->customer->first_name.$order->customer->last_name }}<br>
                        Phone:{{ $order->customer->phone}}<br>
                        Address:{{ $order->delivery_address }}<br>
                        Email:{{ $order->customer->email }}
                    </address>
                </div>
            </div>

            <table>
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Item</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-end">Unit Price</th>
                        <th class="text-end">Sub Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->orderDetails as $key => $item)
                        <tr>
                            <td class="text-center">{{ $key + 1 }}</td>
                            <td>
                                <strong>{{ $item->product_name }}</strong><br>
                                Code: {{ $item->product_code }}<br>
                                Color: {{ $item->product_color }}<br>
                                Size: {{ $item->product_size }}
                            </td>
                            <td class="text-center">{{ $item->product_qty }}</td>
                            <td class="text-end">Tk {{ number_format($item->product_price, 2) }}</td>
                            <td class="text-end">Tk {{ number_format($item->product_price * $item->product_qty, 2) }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="4" class="fw-bold text-uppercase text-end">Grand Total</td>
                        <td class="fw-bold text-end h4">Tk {{ number_format($item->product_price * $item->product_qty, 2) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
