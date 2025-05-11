@extends('website.master')
@section('body')

    <body>
    <!--====== Checkout 2 Part Start ======-->
    <section class="checkout-wrapper pt-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="checkout-style-1">
                        <div class="checkout-table table-responsive">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if(session('delete'))
                                <div class="alert alert-danger">
                                    {{ session('delete') }}
                                </div>
                            @endif
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="product">Product</th>
                                    <th class="quantity">Quantity</th>
                                    <th class="price">Price</th>
                                    <th class="action">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                  @foreach ($products as $product)
                                  <tr>
                                    <td>
                                        <div class="product-cart d-flex">
                                            <div class="product-thumb">
                                                <img
                                                    src="{{asset($product->options->image)}}"
                                                    alt="Product"
                                                    width="50px"
                                                    height="50px"
                                                />
                                            </div>
                                            <div class="product-content media-body">
                                                <h5 class="title">
                                                    <a href="product-details-page.html">{{ $product->name }}</a>
                                                </h5>
                                                <span>Size:{{ $product->options->size }}</span>
                                                <span>Color:{{ $product->options->color }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <form action="{{ route('cart.update', $product->rowId) }}" method="POST" class="d-flex align-items-center">
                                            @csrf
                                             <div class="product-quantity d-inline-flex">
                                                <button type="button" class="qty-btn sub">-</button>
                                                <input type="text" name="qty" value="{{ $product->qty }}" class="qty-input" style="width: 60px; text-align:center;" />
                                                <button type="button" class="qty-btn add">+</button>
                                            </div>

                                            <button type="submit" class="btn btn-primary ms-2">Update</button>
                                        </form>

                                    </td>
                                    <td>
                                        <p class="price">{{ $product->price }}</p>
                                    </td>
                                    <td>
                                        <form action="{{ route('cart.destroy', $product->rowId) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <ul class="action">
                                                <li>
                                                    <button type="submit" class="delete" style="background: none; border: none; cursor: pointer;">
                                                        <i class="mdi mdi-delete"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </form>
                                    </td>
                                </tr>
                                  @endforeach


                                </tbody>
                            </table>
                        </div>
                        <div
                            class="checkout-coupon-total checkout-coupon-total-2 d-flex flex-wrap"
                        >
                            <div class="checkout-coupon">
                                <span>Apply Coupon to get discount!</span>
                                <form action="#">
                                    <div class="single-form form-default d-flex">
                                        <div class="form-input form">
                                            <input type="text" placeholder="Coupon Code" />
                                        </div>
                                        <button class="main-btn primary-btn">Apply</button>
                                    </div>
                                </form>
                            </div>
                            <div class="checkout-total">
                                <div class="single-total">
                                    <p class="value">Subtotal Price:</p>
                                    <p class="price">${{ Cart::subtotal(0,'','') }}</p>
                                </div>
                                <div class="single-total">
                                    <p class="value">Shipping Cost (+):</p>
                                    <p class="price">$60</p>
                                </div>
                                <div class="single-total">
                                    <p class="value">Tax Amount (10%):</p>
                                    <p class="price">${{ round((int)Cart::subtotal(0,'','')*0.10) }}</p>
                                </div>
                                <div class="single-total total-payable">
                                    <p class="value">Total Payable:</p>
                                    <p class="price">${{ (int)Cart::subtotal(0,'','')+round((int)Cart::subtotal(0,'','')*0.10)+ 60 }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="checkout-btn d-sm-flex justify-content-between">
                            <div class="single-btn">
                                <a
                                    href="javascript:void(0)"
                                    class="main-btn primary-btn-border"
                                >continue shopping</a
                                >
                            </div>
                            <div class="single-btn">
                                <a href="" class="main-btn primary-btn"
                                >Pay now</a
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Checkout 2 Part Ends ======-->

    <!--====== Clients Logo Part Start ======-->
    <section class="clients-logo-section pt-70 pb-70">
        <div class="container">
            <div class="row client-logo-active">
                <div class="col-lg-3">
                    <div class="single-logo-wrapper">
                        <img src="{{asset('/')}}website/assets/images/client-logo/uideck-logo.svg" alt="" />
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single-logo-wrapper">
                        <img src="{{asset('/')}}website/assets/images/client-logo/graygrids-logo.svg" alt="" />
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single-logo-wrapper">
                        <img src="{{asset('/')}}website/assets/images/client-logo/lineicons-logo.svg" alt="" />
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single-logo-wrapper">
                        <img src="{{asset('/')}}website/assets/images/client-logo/pagebulb-logo.svg" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Clients Logo Part Ends ======-->
    <script>
        document.querySelectorAll('.qty-btn').forEach(function(btn) {
            btn.addEventListener('click', function () {
                let input = this.parentElement.querySelector('.qty-input');
                let value = parseInt(input.value);

                if (this.classList.contains('add')) {
                    input.value = value + 1;
                } else if (this.classList.contains('sub')) {
                    if (value > 1) input.value = value - 1;
                }
            });
        });
    </script>

    </body>

@endsection
