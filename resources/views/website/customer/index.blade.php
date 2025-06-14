@extends('website.master');
@section('body')

    <!--====== Profile Start ======-->
    <section class="profile-wrapper pt-50 pb-100">
      <div class="container">
        <div class="row justify-content-center">
            <div class="row d-flex align-items-start">
    <!-- Left Sidebar -->
    <div class="col-md-3 d-flex justify-content-center sidebar-wrapper">
        <div class="list-group w-100">
            <a href="{{ url('customer/dashboard/orders') }}"
               class="list-group-item list-group-item-action {{ request()->is('customer/dashboard/orders') ? 'active bg-primary text-white' : '' }}">
                My Orders
            </a>
            <a href="{{ url('customer/dashboard/password') }}"
               class="list-group-item list-group-item-action {{ request()->is('customer/dashboard/password') ? 'active bg-primary text-white' : '' }}">
                Change Password
            </a>
            <a href="{{ url('/customer/dashboard') }}"
               class="list-group-item list-group-item-action {{ request()->is('/customer/dashboard') ? 'active bg-primary text-white' : '' }}">
                Dashboard
            </a>
            <a href="{{ url('customer/dashboard/notifications') }}"
               class="list-group-item list-group-item-action {{ request()->is('customer/dashboard/notifications') ? 'active bg-primary text-white' : '' }}">
                Notifications
            </a>
        </div>
    </div>

    <div class="col-lg-9">
                <div class="profile">
              <div class="profile-header">
                <div
                  class="profile-cover-photo bg_cover"
                  style="background-image: url({{asset('/')}}website/assets/images/profile-cover.png)"
                ></div>
                <div
                  class="profile-author d-sm-flex flex-row-reverse justify-content-between align-items-end"
                >
                  <div class="profile-photo">
                    <img
                      src="{{asset('/')}}website/assets/images/profile-photo.png"
                      alt="Profile Photo"
                    />
                  </div>
                  <div class="profile-name">
                    <h4 class="name">{{ $customer->first_name.$customer->last_name }}</h4>
                    <p class="email">{{ $customer->email }}</p>
                  </div>
                </div>
              </div>
              <div class="profile-body">
                <div class="profile-title">
                  <h5 class="title">Personal Details</h5>
                  <a class="profile-link" href="javascript:void(0)">edit</a>
                </div>
                <div class="profile-details">
                  <div class="single-details-item d-flex flex-wrap">
                    <div class="details-title">
                      <h6 class="title">User Full Name:</h6>
                    </div>
                    <div class="details-content media-body">
                      <p>{{ $customer->first_name.$customer->last_name }}</p>
                    </div>
                  </div>
                  <div class="single-details-item d-flex flex-wrap">
                    <div class="details-title">
                      <h6 class="title">Email:</h6>
                    </div>
                    <div class="details-content media-body">
                      <p>{{ $customer->email }}</p>
                    </div>
                  </div>
                  <div class="single-details-item d-flex flex-wrap">
                    <div class="details-title">
                      <h6 class="title">Phone:</h6>
                    </div>
                    <div class="details-content media-body">
                      <p>{{ $customer->phone }}</p>
                    </div>
                  </div>
                  <div class="single-details-item d-flex flex-wrap">
                    <div class="details-title">
                      <h6 class="title">Address:</h6>
                    </div>
                    <div class="details-content media-body">
                      <p>Company Inc., 8901 Marmora Road, Glasgow, D04 89GR.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
    </section>
    <!--====== Profile Ends ======-->


@endsection
