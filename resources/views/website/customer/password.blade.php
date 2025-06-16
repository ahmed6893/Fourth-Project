@extends('website.master')
@section('body')

<section class="pt-50 pb-100">
  <div class="container">
    <div class="row d-flex align-items-start">

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

      {{-- Form --}}
      <div class="col-md-9">
        <div class="card p-4">
            <h4 class="mb-3">Edit Profile & Change Password</h4>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @elseif(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form action="{{ route('customer.update') }}" method="POST">
                @csrf
                <h5 class="mb-2">Personal Information</h5>
                <div class="mb-3">
                    <label>First Name</label>
                    <input type="text" name="first_name" class="form-control" value="{{ $customer->first_name }}">
                </div>
                <div class="mb-3">
                    <label>Last Name</label>
                    <input type="text" name="last_name" class="form-control" value="{{ $customer->last_name }}">
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $customer->email }}">
                </div>
                <div class="mb-3">
                    <label>Phone</label>
                    <input type="text" name="phone" class="form-control" value="{{ $customer->phone }}">
                </div>
                <div class="mb-3">
                    <label>Address</label>
                    <textarea name="address" class="form-control">{{ $customer->address }}</textarea>
                </div>

                <hr class="my-4">

                <h5 class="mb-2">Change Password (Optional)</h5>
                <div class="mb-3">
                    <label>Current Password</label>
                    <input type="password" name="current_password" class="form-control">
                </div>
                <div class="mb-3">
                    <label>New Password</label>
                    <input type="password" name="new_password" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Confirm New Password</label>
                    <input type="password" name="new_password_confirmation" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary mt-3">Update Profile</button>
            </form>
        </div>
      </div>

    </div>
  </div>
</section>

@endsection
