@extends('website.master')
@section('body')

    <!--====== Header Style 1 Part Start ======-->
    <section class="header-style-1">
        <div class="header-big">
            <div class="header-items-active">
                <div class="single-header-item bg_cover"
                     style="background-image: url({{asset('/')}}website/assets/images/header-1/header-big-1.jpg);">
                    <div class="header-item-content">
                        <h3 class="title">Don’t say it with flowers: A NOMOS watch is a gift that lasts</h3>
                        <a href="javascript:void(0)" class="link">Our Valentine's Day collection</a>
                    </div>
                </div>
                <div class="single-header-item bg_cover"
                     style="background-image: url({{asset('/')}}website/assets/images/header-1/header-big-2.jpg);">
                    <div class="header-item-content">
                        <h3 class="title">Don’t say it with flowers: A NOMOS watch is a gift that lasts</h3>
                        <a href="javascript:void(0)" class="link">Our Valentine's Day collection</a>
                    </div>
                </div>
                <div class="single-header-item bg_cover"
                     style="background-image: url({{asset('/')}}website/assets/images/header-1/header-big-1.jpg);">
                    <div class="header-item-content">
                        <h3 class="title">Don’t say it with flowers: A NOMOS watch is a gift that lasts</h3>
                        <a href="javascript:void(0)" class="link">Our Valentine's Day collection</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-min">
            <div class="header-min-item product-style-25 bg_cover"
                 style="background-image: url({{asset('/')}}website/assets/images/header-1/header-min-1.jpg);">
                <div class="product-content">
                    <h4 class="title"><a href="$">Metro 38 Date</a></h4>
                    <p>Reference 1102</p>
                    <a href="javascript:void(0)" class="main-btn primary-btn-border"> <img src="{{asset('/')}}website/assets/images/icon-svg/cart-5.svg" alt="">$
                        399</a>
                </div>
            </div>
            <div class="header-min-item product-style-25 bg_cover"
                 style="background-image: url({{asset('/')}}website/assets/images/header-1/header-min-2.jpg);">
                <div class="product-content">
                    <h4 class="title"><a href="product-details-page.html">Metro 38 Date</a></h4>
                    <p>Reference 1102</p>
                    <a href="javascript:void(0)" class="main-btn primary-btn-border"> <img src="{{asset('/')}}website/assets/images/icon-svg/cart-5.svg" alt="">$
                        399</a>
                </div>
            </div>
        </div>
    </section>
    <!--====== Header Style 1 Part Ends ======-->
    <!--====== Content Card Style 4 Part Start ======-->
    <section class="content-card-style-4 pt-70 pb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single-content mt-15 text-center">
                        <div class="content-icon">
                            <i class="mdi mdi-truck-fast"></i>
                        </div>
                        <div class="content-content">
                            <h4 class="title"><a href="javascript:void(0)">Two-hour delivery</a></h4>
                            <p>Available in most metros on selected in-stock products</p>
                            <a href="javascript:void(0)" class="more">learn more</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single-content mt-15 text-center">
                        <div class="content-icon">
                            <i class="mdi mdi-message-text"></i>
                        </div>
                        <div class="content-content">
                            <h4 class="title"><a href="javascript:void(0)">Get help buying</a></h4>
                            <p>Have a question? Call a Specialist or chat online for help</p>
                            <a href="contact-page.html" class="more">Contact us</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single-content mt-15 text-center">
                        <div class="content-icon">
                            <i class="mdi mdi-ticket-percent"></i>
                        </div>
                        <div class="content-content">
                            <h4 class="title"><a href="javascript:void(0)">Find the card for you</a></h4>
                            <p>Get 3% Daily Cash with special financing offers from us</p>
                            <a href="javascript:void(0)" class="more">learn more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Content Card Style 4 Part Ends ======-->

    <!--====== Product Style 1 Part Start ======-->
    <section class="product-wrapper pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-50">
                        <h1 class="heading-1 font-weight-700">Featured Items</h1>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($products as $product)
                <div class="col-lg-4 col-sm-6">
                    <div class="product-style-1 mt-30">
                        <div class="product-image">
                            <span class="icon-text text-style-1">NEW</span>
                            <div class="product-active">
                                <div class="product-item active">
                                    <img src="{{asset($product->product_image)}}" alt="product" height="430px" width="350px">
                                </div>
                            </div>
                            <a class="add-wishlist" href="javascript:void(0)">
                                <i class="mdi mdi-heart-outline"></i>
                            </a>
                        </div>
                        <div class="product-content text-center">
                            <h4 class="title"><a href="{{route('product.details',$product->id)}}">{{ $product->name }}</a></h4>
                            <p>{{ $product->category->name }}</p>
                            <a href="{{route('product.details',$product->id)}}" class="main-btn secondary-1-btn">
                                $ {{ $product->selling_price }}
                            </a>
                        </div>
                    </div>

                </div>
                @endforeach
            </div>

        </div>
    </section>
    <!--====== Product Style 1 Part Ends ======-->

    <!--====== Product Style 7 Part Start ======-->
    <section class="product-wrapper pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-50">
                        <h1 class="heading-1 font-weight-700">Recent Items</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="product-style-7 mt-30">
                        <div class="product-image">
                            <div class="product-active">
                                <div class="product-item active">
                                    <img src="{{asset('/')}}website/assets/images/product-4/product-1.jpg" alt="product">
                                </div>
                                <div class="product-item">
                                    <img src="{{asset('/')}}website/assets/images/product-4/product-2.jpg" alt="product">
                                </div>
                            </div>
                        </div>
                        <div class="product-content">
                            <ul class="product-meta">
                                <li>
                                    <a class="add-wishlist" href="javascript:void(0)">
                                        <i class="mdi mdi-heart-outline"></i>
                                        Add to Favorite
                                    </a>
                                </li>
                                <li>
                                    <span><i class="mdi mdi-star"></i> 4.5/5</span>
                                </li>
                            </ul>
                            <h4 class="title"><a href="product-details-page.html">Metro 38 Date</a></h4>
                            <p>Reference 1102</p>
                            <span class="price">$ 399</span>
                            <a href="javascript:void(0)" class="main-btn primary-btn">
                                <img src="{{asset('/')}}website/assets/images/icon-svg/cart-4.svg" alt="">
                                Add to Cart
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-style-7 mt-30">
                        <div class="product-image">
                            <div class="product-active">
                                <div class="product-item active">
                                    <img src="{{asset('/')}}website/assets/images/product-4/product-3.jpg" alt="product">
                                </div>
                                <div class="product-item">
                                    <img src="{{asset('/')}}website/assets/images/product-4/product-4.jpg" alt="product">
                                </div>
                            </div>
                        </div>
                        <div class="product-content">
                            <ul class="product-meta">
                                <li>
                                    <a class="add-wishlist" href="javascript:void(0)">
                                        <i class="mdi mdi-heart-outline"></i>
                                        Add to Favorite
                                    </a>
                                </li>
                                <li>
                                    <span><i class="mdi mdi-star"></i> 4.5/5</span>
                                </li>
                            </ul>
                            <h4 class="title"><a href="product-details-page.html">Man's Shoe</a></h4>
                            <p>Reference 1102</p>
                            <span class="price">$ 399</span>
                            <a href="javascript:void(0)" class="main-btn primary-btn">
                                <img src="{{asset('/')}}website/assets/images/icon-svg/cart-4.svg" alt="">
                                Add to Cart
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-style-7 mt-30">
                        <div class="product-image">
                            <span class="icon-text text-style-1">20% off</span>
                            <div class="product-active">
                                <div class="product-item active">
                                    <img src="{{asset('/')}}website/assets/images/product-4/product-5.jpg" alt="product">
                                </div>
                                <div class="product-item">
                                    <img src="{{asset('/')}}website/assets/images/product-4/product-6.jpg" alt="product">
                                </div>
                            </div>
                        </div>
                        <div class="product-content">
                            <ul class="product-meta">
                                <li>
                                    <a class="add-wishlist" href="javascript:void(0)">
                                        <i class="mdi mdi-heart-outline"></i>
                                        Add to Favorite
                                    </a>
                                </li>
                                <li>
                                    <span><i class="mdi mdi-star"></i> 4.5/5</span>
                                </li>
                            </ul>
                            <h4 class="title"><a href="product-details-page.html">Lotto T Shirt</a></h4>
                            <p>Reference 1102</p>
                            <span class="price">$ 399</span>
                            <a href="javascript:void(0)" class="main-btn primary-btn">
                                <img src="{{asset('/')}}website/assets/images/icon-svg/cart-4.svg" alt="">
                                Add to Cart
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-style-7 mt-30">
                        <div class="product-image">
                            <div class="product-active">
                                <div class="product-item active">
                                    <img src="{{asset('/')}}website/assets/images/product-4/product-7.jpg" alt="product">
                                </div>
                                <div class="product-item">
                                    <img src="{{asset('/')}}website/assets/images/product-4/product-8.jpg" alt="product">
                                </div>
                            </div>
                        </div>
                        <div class="product-content">
                            <ul class="product-meta">
                                <li>
                                    <a class="add-wishlist" href="javascript:void(0)">
                                        <i class="mdi mdi-heart-outline"></i>
                                        Add to Favorite
                                    </a>
                                </li>
                                <li>
                                    <span><i class="mdi mdi-star"></i> 4.5/5</span>
                                </li>
                            </ul>
                            <h4 class="title"><a href="product-details-page.html">Smart Watch</a></h4>
                            <p>Reference 1102</p>
                            <span class="price">$ 399</span>
                            <a href="javascript:void(0)" class="main-btn primary-btn">
                                <img src="{{asset('/')}}website/assets/images/icon-svg/cart-4.svg" alt="">
                                Add to Cart
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-style-7 mt-30">
                        <div class="product-image">
                            <div class="product-active">
                                <div class="product-item active">
                                    <img src="{{asset('/')}}website/assets/images/product-4/product-9.jpg" alt="product">
                                </div>
                                <div class="product-item">
                                    <img src="{{asset('/')}}website/assets/images/product-4/product-10.jpg" alt="product">
                                </div>
                            </div>
                        </div>
                        <div class="product-content">
                            <ul class="product-meta">
                                <li>
                                    <a class="add-wishlist" href="javascript:void(0)">
                                        <i class="mdi mdi-heart-outline"></i>
                                        Add to Favorite
                                    </a>
                                </li>
                                <li>
                                    <span><i class="mdi mdi-star"></i> 4.5/5</span>
                                </li>
                            </ul>
                            <h4 class="title"><a href="product-details-page.html">Smart Gadget</a></h4>
                            <p>Reference 1102</p>
                            <span class="price">$ 399</span>
                            <a href="javascript:void(0)" class="main-btn primary-btn">
                                <img src="{{asset('/')}}website/assets/images/icon-svg/cart-4.svg" alt="">
                                Add to Cart
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-style-7 mt-30">
                        <div class="product-image">
                            <span class="icon-text text-style-1">Out Of Stoke</span>
                            <div class="product-active">
                                <div class="product-item active">
                                    <img src="{{asset('/')}}website/assets/images/product-4/product-11.jpg" alt="product">
                                </div>
                                <div class="product-item">
                                    <img src="{{asset('/')}}website/assets/images/product-4/product-12.jpg" alt="product">
                                </div>
                            </div>
                        </div>
                        <div class="product-content">
                            <ul class="product-meta">
                                <li>
                                    <a class="add-wishlist" href="javascript:void(0)">
                                        <i class="mdi mdi-heart-outline"></i>
                                        Add to Favorite
                                    </a>
                                </li>
                                <li>
                                    <span><i class="mdi mdi-star"></i> 4.5/5</span>
                                </li>
                            </ul>
                            <h4 class="title"><a href="product-details-page.html">Polo Cap</a></h4>
                            <p>Reference 1102</p>
                            <span class="price">$ 399</span>
                            <a href="javascript:void(0)" class="main-btn primary-btn">
                                <img src="{{asset('/')}}website/assets/images/icon-svg/cart-4.svg" alt="">
                                Add to Cart
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Product Style 7 Part Ends ======-->

    <!--====== Features Part Start ======-->
    <section class="features-section pt-100 pb-50 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="features-title text-center mb-50">
                        <h1 class="heading-1 font-weight-700">Awesome Features</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-feature-wrapper">
                        <div class="feature-icon">
                            <i class="lni lni-cog"></i>
                        </div>
                        <div class="feature-content">
                            <h5 class="heading-5 font-weight-500 mb-10">Bootstrap 5</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta quos iste veniam.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-feature-wrapper">
                        <div class="feature-icon">
                            <i class="lni lni-code"></i>
                        </div>
                        <div class="feature-content">
                            <h5 class="heading-5 font-weight-500 mb-10">Clean Design</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta quos iste veniam.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-feature-wrapper">
                        <div class="feature-icon">
                            <i class="lni lni-layers"></i>
                        </div>
                        <div class="feature-content">
                            <h5 class="heading-5 font-weight-500 mb-10">Included Business Pages</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta quos iste veniam.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-feature-wrapper">
                        <div class="feature-icon">
                            <i class="lni lni-laptop-phone"></i>
                        </div>
                        <div class="feature-content">
                            <h5 class="heading-5 font-weight-500 mb-10">Fully Responsive</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta quos iste veniam.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-feature-wrapper">
                        <div class="feature-icon">
                            <i class="lni lni-brush"></i>
                        </div>
                        <div class="feature-content">
                            <h5 class="heading-5 font-weight-500 mb-10">Completely Customizable</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta quos iste veniam.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-feature-wrapper">
                        <div class="feature-icon">
                            <i class="lni lni-rocket"></i>
                        </div>
                        <div class="feature-content">
                            <h5 class="heading-5 font-weight-500 mb-10">Fast and Well-optimized</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta quos iste veniam.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Features Part Ends ======-->

    <!--====== Clients Logo Part Start ======-->
    <section class="clients-logo-section pt-70 pb-70">
        <div class="container">
            <div class="row client-logo-active">
                <div class="col-lg-3">
                    <div class="single-logo-wrapper">
                        <img src="{{asset('/')}}website/assets/images/client-logo/uideck-logo.svg" alt="">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single-logo-wrapper">
                        <img src="{{asset('/')}}website/assets/images/client-logo/graygrids-logo.svg" alt="">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single-logo-wrapper">
                        <img src="{{asset('/')}}website/assets/images/client-logo/lineicons-logo.svg" alt="">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single-logo-wrapper">
                        <img src="{{asset('/')}}website/assets/images/client-logo/pagebulb-logo.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Clients Logo Part Ends ======-->
@endsection
