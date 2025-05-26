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
                        <h1 class="page-title">Order Edit</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Apps</li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Order Edit</li>
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
                                <form action="{{route('order.update',$order->id)}}" method="POST" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label  class="form-label text-dark">Customer Info:</label>
                                        <input type="text" value="{{$order->customer->first_name.' '.$order->customer->last_name.' : '.$order->customer->phone}}" class="form-control text-dark" readonly>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label  class="form-label text-dark">Order Total:</label>
                                        <input type="text" value="{{$order->order_total}}" class="form-control text-dark" readonly>
                                    </div>
                                </div>

                            <div class="form-group mb-3">
                                <label for="courier_id" class="text-dark">Courier</label>
                                <select class="form-control" name="courier_id" id="courier_id">
                                    <option value=""> -- Select Courier --</option>
                                    @foreach($couriers as $courier)
                                        <option value="{{$courier->id}}" {{$order->courier_id == $courier->id ? 'selected' : ''}}>
                                            {{$courier->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                                <div class="form-group mb-3">
                                    <label for="order_status" class="text-dark">Order Status</label>
                                    <select class="form-control" name="order_status" id="order_status">
                                        <option value=""> -- Select Order Status --</option>
                                        <option value="pending" {{$order->order_status == 'pending' ? 'selected' : ''}}>Pending</option>
                                        <option value="processing" {{$order->order_status == 'processing' ? 'selected' : ''}}>Processing</option>
                                        <option value="complete" {{$order->order_status == 'complete' ? 'selected' : ''}}>Complete</option>
                                        <option value="cancel" {{$order->order_status == 'cancel' ? 'selected' : ''}}>Cancel</option>
                                    </select>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-12">
                                        <label class="form-label text-dark">Delivery Address</label>
                                        <textarea class="form-control" name="delivery_address" rows="4" >{{$order->delivery_address}}</textarea>
                                    </div>
                                </div>
                                <!-- Buttons -->
                                <div class="text-end">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fe fe-check-circle"></i> Update Order Info
                                    </button>
                                </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
