@extends('website.master')
@section('body')

    <body>
    <!--====== Checkout Form Steps Part Start ======-->
    <section class="checkout-wrapper pt-50">
        <div class="container">
            <form action="{{ route('new-order') }}" method="POST">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                            <div class="checkout-steps-form-style-1 mt-50 ">
                                <h6 class="title text-dark">Your Delivery Address</h6>
                                <section class="checkout-steps-form-content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="single-form form-default">
                                                <div class="row">
                                                    <div class="col-md-12 form-input form text-dark">
                                                        <textarea placeholder="Enter Address" name="delivery_address" ></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>

                            <!-- Row 2: Payment Method -->
                            <div class="checkout-steps-form-style-1 mt-50">
                                <h6 class="title text-dark">Payment Method</h6>
                                <section class="checkout-steps-form-content">
                                    <div class="single-form">
                                        <label class="text-dark">Choose Payment Method</label>
                                        <div class="tp-checkout-option-wrapper mt-2">
                                            <div class="tp-checkout-option">
                                                <input id="payment_cash" type="radio" name="payment_method" value="cash" checked>
                                                <label for="payment_cash">Cash On Delivery</label>
                                            </div>
                                            <div class="tp-checkout-option">
                                                <input id="payment_online" type="radio" name="payment_method" value="online">
                                                <label for="payment_online">Online Payment</label>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>

                        </div>

                    <div class="col-lg-4">
                        <div class="checkout-sidebar pt-20">
                            <div class="checkout-sidebar-price-table mt-30">
                                <h5 class="title">Pricing Table</h5>
                                @php($sum = 0)
                                @foreach (Cart::content() as $item )
                                    <div class="sub-total-price">
                                        <div class="total-price">
                                            <p class="value">
                                                Name:{{ $item->name }}
                                                Quantity:{{ $item->qty }}
                                                Price:{{ $item->price }}
                                            </p>
                                            <p class="price">{{ $item->price * $item->qty }}</p>
                                        </div>
                                    </div>
                                    @php($sum = $sum +($item->price * $item->qty))
                                @endforeach

                                <div class="total-payable">
                                    <div class="payable-price">
                                        <p class="value">Subtotal Price:</p>
                                        <p class="price">TK.{{ $sum }}</p>
                                    </div>
                                </div>

                                <div class="total-payable">
                                    <div class="payable-price">
                                        <p class="value">Shipping:</p>
                                        <p class="price">TK.{{ $shipping = 100 }}</p>
                                    </div>
                                </div>
                                <div class="total-payable">
                                    <div class="payable-price">
                                        <p class="value">Tax (10%):</p>
                                        <p class="price">TK.{{ $tax = $sum*0.10 }}</p>
                                    </div>
                                </div>
                                <div class="total-payable">
                                    <div class="payable-price">
                                        <p class="value">Total:</p>
                                        <p class="price">TK.{{ $totalPayable = $sum + $shipping + $tax }}</p>
                                    </div>
                                </div>
                                <?php
                                    Session::put('order_total',$totalPayable);
                                    Session::put('tax_total',$tax);
                                    Session::put('shipping_total',$shipping);
                                ?>

                                <div class="price-table-btn">
                                    <button href=""class="main-btn primary-btn btn-block" type="submit">Checkout</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!--====== Checkout Form Steps Part Ends ======-->

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


    </body>

@endsection
