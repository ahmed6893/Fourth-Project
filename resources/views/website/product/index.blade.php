@extends('website.master')
@section('body')

    <body>
    <!--====== Category Part Start ======-->
    <section class="category-wrapper pt-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="filter-style-3">
                        <div class="filter-title">
                            <a
                                class="title"
                                data-toggle="collapse"
                                href="#type"
                                role="button"
                                aria-expanded="false">
                                Type
                            </a>
                        </div>
                        <div class="collapse show" id="type">
                            <div class="filter-type">
                                <ul>
                                    <li>
                                        <div class="type-check">
                                            <input type="checkbox" id="type-1" />
                                            <label for="type-1"><span></span> Standalone</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="type-check">
                                            <input type="checkbox" id="type-2" />
                                            <label for="type-2"><span></span> Mobile</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="type-check">
                                            <input type="checkbox" id="type-3" />
                                            <label for="type-3"><span></span> Tethered</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="filter-style-4">
                        <div class="filter-title">
                            <a
                                class="title"
                                data-toggle="collapse"
                                href="#size"
                                role="button"
                                aria-expanded="false"
                            >
                                Select Size
                            </a>
                        </div>
                        <div class="collapse show" id="size">
                            <div class="filter-size">
                                <ul>
                                    <li>XS</li>
                                    <li>S</li>
                                    <li class="active">M</li>
                                    <li>LG</li>
                                    <li>XL</li>
                                    <li>XXL</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="filter-style-7">
                        <div class="filter-title">
                            <a
                                class="title"
                                data-toggle="collapse"
                                href="#color"
                                role="button"
                                aria-expanded="false"
                            >
                                Select Size
                            </a>
                        </div>
                        <div class="collapse show" id="color">
                            <div class="filter-color">
                                <ul>
                                    <li>
                                        <div class="color-check">
                                            <p>
                                                <span style="background-color: #00c2fe"></span>
                                                <strong>Blue</strong>
                                            </p>

                                            <input type="checkbox" id="color-1" />
                                            <label for="color-1"><span></span></label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="color-check">
                                            <p>
                                                <span style="background-color: #e14c7b"></span>
                                                <strong>Red</strong>
                                            </p>

                                            <input type="checkbox" id="color-2" />
                                            <label for="color-2"><span></span></label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="color-check">
                                            <p>
                                                <span style="background-color: #7cb637"></span>
                                                <strong>Green</strong>
                                            </p>

                                            <input type="checkbox" id="color-3" />
                                            <label for="color-3"><span></span></label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="color-check">
                                            <p>
                                                <span style="background-color: #161359"></span>
                                                <strong>Dark</strong>
                                            </p>

                                            <input type="checkbox" id="color-4" />
                                            <label for="color-4"><span></span></label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <div
                                class="breadcrumbs-style breadcrumbs-style-1 d-md-flex justify-content-between align-items-center"
                            >
                                <div class="breadcrumb-left">
                                    <p>Showing 01-09 of 17 Results</p>
                                </div>
                                <div class="breadcrumb-right">
                                    <ul
                                        class="breadcrumb-list-grid nav nav-tabs border-0"
                                        id="myTab"
                                        role="tablist"
                                    >
                                        <li class="nav-item" role="presentation">
                                            <a
                                                id="home-tab"
                                                data-toggle="tab"
                                                href="#home"
                                                role="tab"
                                                aria-controls="home"
                                                aria-selected="true"
                                            >
                                                <i class="mdi mdi-view-list"></i>
                                            </a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a
                                                class="active"
                                                id="profile-tab"
                                                data-toggle="tab"
                                                href="#profile"
                                                role="tab"
                                                aria-controls="profile"
                                                aria-selected="false"
                                            >
                                                <i class="mdi mdi-view-grid"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="tab-content" id="myTabContent">
                                <div
                                    class="tab-pane fade"
                                    id="home"
                                    role="tabpanel"
                                    aria-labelledby="home-tab"
                                >
                                    <div class="row">
                                        <div class="col-lg-12">
                                            @foreach ($products as $product )
                                            <div class="product-style-7 mt-30">
                                                <div class="product-image">
                                                    <div class="product-active">
                                                        <div class="product-item active">
                                                            <img
                                                                src="{{asset($product->product_image)}}"
                                                                alt="product"
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <ul class="product-meta">
                                                        <li>
                                                            <span><i class="mdi mdi-star"></i> 4.5/5</span>
                                                        </li>
                                                    </ul>
                                                    <h4 class="title">
                                                        <a href="{{route('product.details',$product->id)}}">{{ $product->name }}</a>
                                                    </h4>
                                                    <p>{{ $product->category->name }}</p>
                                                    <span class="price">{{ $product->selling_price }}</span>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="tab-pane fade show active"
                                    id="profile"
                                    role="tabpanel"
                                    aria-labelledby="profile-tab"
                                >
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6">
                                            @foreach ($products as $product)
                                            <div class="product-style-1 mt-30">
                                                <div class="product-image">
                                                    <div class="product-active">
                                                        <div class="product-item active">
                                                            <img
                                                                src="{{asset($product->product_image)}}"
                                                                alt="product"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content text-center">
                                                    <h4 class="title">
                                                        <a href="{{ route('product.details',$product->id) }}">{{ $product->name }}</a>
                                                    </h4>
                                                    <p class="mb-2">{{ $product->category->name }}</p>

                                                    <!-- Price Button -->
                                                    <a href="{{ route('product.details',$product->id) }}" class="main-btn secondary-1-btn">
                                                        ৳{{ number_format($product->selling_price) }}
                                                    </a>
                                                </div>
                                            </div>
                                            @endforeach

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="pagination-wrapper pt-70">
                                <ul class="d-flex justify-content-center">
                                    <li>
                                        <a href="javascript:void(0)"
                                        ><i class="lni lni-chevron-left"></i
                                            ></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" class="active">1</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">2</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">3</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">4</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"
                                        ><i class="lni lni-chevron-right"></i
                                            ></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Filter Part Ends ======-->

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

    <!--====== Subscribe Part Start ======-->
    <section class="subscribe-section pt-70 pb-70 bg-primary-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="heading text-center">
                        <h1 class="heading-1 font-weight-700 text-white mb-10">
                            Subscribe Newsletter
                        </h1>
                        <p class="gray-3">
                            Be the first to know when new products drop and get
                            behind-the-scenes content straight.
                        </p>
                    </div>
                    <div class="subscribe-form">
                        <form action="#">
                            <div class="single-form form-default">
                                <label class="text-white-50">Enter your email address</label>
                                <div class="form-input">
                                    <input type="text" placeholder="user@email.com" />
                                    <i class="mdi mdi-account"></i>
                                    <button class="main-btn primary-btn">
                                        <span class="mdi mdi-send"></span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Subscribe Part Ends ======-->

    </body>

@endsection
