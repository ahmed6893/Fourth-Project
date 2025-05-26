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
                        <h1 class="page-title">All Order</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Apps</li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Orders</li>
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
                                    <h3 class="card-title">All Orders Info</h3>
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
                                    <table id="project-table" class="table text-nowrap mb-0 table-bordered border-top border-bottom project-list-main">
                                        <thead class="table-head">
                                        <tr>
                                            <th class="bg-transparent border-bottom-0 text-center w-5">S.no</th>
                                            <th class="bg-transparent border-bottom-0">Image</th>
                                            <th class="bg-transparent border-bottom-0">Product Name</th>
                                            <th class="bg-transparent border-bottom-0">Customer</th>
                                            <th class="bg-transparent border-bottom-0">Order Date</th>
                                            <th class="bg-transparent border-bottom-0">Order Total</th>
                                            <th class="bg-transparent border-bottom-0">Order Status</th>
                                            <th class="bg-transparent border-bottom-0">Payment Status</th>
                                            <th class="bg-transparent border-bottom-0 no-btn">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody class="table-body">

                                        @foreach($orders as $order)
                                            @foreach ($order->orderDetails as $orderDetail)
                                                <tr>
                                                <td class="text-muted fs-15 fw-semibold text-center">{{$loop->iteration}}</td>
                                                <td>
                                                    <img src="{{asset($orderDetail->product_image)}}" alt="NO Image" width="50" height="50">
                                                </td>
                                                <td>
                                                    <h6 class="mb-0 fs-14 fw-semibold">{{$orderDetail->product_name}}</h6>
                                                </td>
                                                <td>
                                                        <h6 class="mb-0 fs-14 fw-semibold">
                                                            {{ $order->customer->first_name. $order->customer->last_name ?? 'Customer Missing' }}<br/>
                                                            {{ $order->customer?->phone ?? 'N/A' }}
                                                        </h6>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0 fs-14 fw-semibold">{{$order->order_date}}</h6>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0 fs-14 fw-semibold">{{$order->order_total}}</h6>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0 fs-14 fw-semibold">{{$order->order_status}}</h6>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0 fs-14 fw-semibold">{{$order->payment_method}}</h6>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-stretch">
                                                        <a class="btn btn-sm btn-outline-info border me-2" href="{{route('order.details',$order->id)}}" title="Order Detail">
                                                            <i class="fe fe-bookmark"></i>
                                                        </a>
                                                        <a class="btn btn-sm btn-outline-primary border me-2" href="{{route('order.edit',$order->id)}}" title="Order Edit">
                                                            <i class="fe fe-edit"></i>
                                                        </a>
                                                        <a class="btn btn-sm btn-outline-success border me-2" href="{{route('order.invoice',$order->id)}}" title="Order Invoice">
                                                            <i class="fe fe-book"></i>
                                                        </a>
                                                        <a class="btn btn-sm btn-outline-secondary border me-2" href="{{route('order.download-invoice',$order->id)}}" title="Order Download Invoice">
                                                            <i class="fe fe-download"></i>
                                                        </a>
                                                        <form action="{{route('order.destroy',$order->id)}}" method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit" class="btn btn-sm btn-outline-danger border me-2" data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                                                <i class="fe fe-trash-2"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
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
