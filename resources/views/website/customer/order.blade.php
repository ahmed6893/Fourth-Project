@extends('website.master')
@section('body')

<section class="profile-wrapper pt-50 pb-100">
  <div class="container">
    <div class="row justify-content-center">
      <div class="row d-flex align-items-start">

            <!-- Left Sidebar -->
    <div class="col-md-3 d-flex justify-content-center sidebar-wrapper">
        <div class="list-group w-100">
            <a href="{{ url('/customer/dashboard') }}"
               class="list-group-item list-group-item-action {{ request()->is('/customer/dashboard') ? 'active bg-primary text-white' : '' }}">
                Dashboard
            </a>
            <a href="{{ url('/customer/order') }}"
               class="list-group-item list-group-item-action {{ request()->is('/customer/order') ? 'active bg-primary text-white' : '' }}">
                My Orders
            </a>
            <a href="{{ url('/customer/updatePassword') }}"
               class="list-group-item list-group-item-action {{ request()->is('/customer/updatePassword') ? 'active bg-primary text-white' : '' }}">
                Edit Profile
            </a>
            <a href="{{ url('customer/dashboard/notifications') }}"
               class="list-group-item list-group-item-action {{ request()->is('customer/dashboard/notifications') ? 'active bg-primary text-white' : '' }}">
                Notifications
            </a>
        </div>
    </div>

        <!-- My Orders Section -->
        <div class="col-lg-9">
          <div class="card shadow-sm rounded p-4">
            <h4 class="mb-4">My Orders</h4>
            @if(count($orders) > 0)
              <div class="table-responsive">
                <table class="table table-bordered table-hover">
                  <thead class="thead-dark">
                    <tr>
                      <th>Order ID</th>
                      <th>Date</th>
                      <th>Total</th>
                      <th>Status</th>
                      <th>Payment</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($orders as $order)
                      <tr>
                        <td>#{{ $order->id }}</td>
                        <td>{{ $order->order_date }}</td>
                        <td>{{ number_format($order->order_total, 2) }}৳</td>
                        <td>
                          <span class="badge
                            @if($order->order_status == 'pending') badge-warning
                            @elseif($order->order_status == 'processing') badge-info
                            @elseif($order->order_status == 'complete') badge-success
                            @else badge-secondary @endif">
                            {{ ucfirst($order->order_status) }}
                          </span>
                        </td>
                        <td>{{ ucfirst($order->payment_method) }}</td>
                        <td>
                          <a href="*{{ url('/customer/dashboard/order-details/'.$order->id) }}" class="btn btn-sm btn-primary">
                            View
                          </a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            @else
              <div class="alert alert-info">You have not placed any orders yet.</div>
            @endif
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

@endsection
