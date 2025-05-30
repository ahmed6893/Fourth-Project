@extends('website.master')
@section('body')

    <body>
    <!--====== Product Details Style 1 Part Start ======-->
    <section class="product-details-wrapper pt-50 pb-100">
        <div class="container">
            <div class="product-details-style-1">
                <div class="row flex-lg-row-reverse align-items-center">
                    <div class="col-lg-6">
                        <div class="product-details-image mt-50">
                            <div class="product-image">
                                <div class="product-image-active-1">
                                    <div class="single-image">
                                        <img
                                            id="main-image"
                                            src="{{ asset($product->product_image) }}"
                                            alt=""
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="product-thumb-image">
                                <div class="product-thumb-image-active-1">
                                    @foreach ($product->productImages as $productImage)
                                        <div class="single-thumb">
                                            <img
                                                class="thumb-image"
                                                src="{{ asset($productImage->image) }}"
                                                alt=""
                                                style="cursor: pointer; width: 70px;"
                                            />
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <form action="{{ route('cart.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <input type="hidden" name="color" id="selectedColor">
                            <input type="hidden" name="size" id="selectedSize">
                            <div class="product-details-content mt-45">
                                <p class="sub-title">{{$product->category->name}}</p>
                                <h2 class="title">{{$product->name}}</h2>
                                <div class="product-select-wrapper flex-wrap">
                                    <div class="select-item">
                                        <h6 class="select-title">Select Color:</h6>
                                        <ul class="color-select">
                                            @foreach($product->productColors as $key => $productColor)
                                                <li
                                                    data-color="{{ $productColor->color->name }}"
                                                    style="background-color: {{ $productColor->color->name }};"
                                                    class="{{ $key == 0 ? 'active' : '' }}"
                                                ></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="select-item">
                                        <h6 class="select-title">Select Size:</h6>
                                        <ul class="size-select">
                                            @foreach($product->productSizes as $key => $productSize)
                                                <li class="size-option {{ $key == 0 ? 'active' : '' }}" data-size="{{ $productSize->size->name }}">
                                                    {{ $productSize->size->name }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>

                                    <div class="select-item">
                                        <h6 class="select-title">Select Quantity:</h6>

                                        <div class="select-quantity">
                                            <button type="button" id="sub" class="sub">
                                                <i class="mdi mdi-minus"></i>
                                            </button>
                                            <input type="text" name="qty" value="1" />
                                            <button type="button" id="add" class="add">
                                                <i class="mdi mdi-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="product-price">
                                    <h6 class="price-title">Price:</h6>
                                    <p class="sale-price">TK:{{$product->selling_price}}</p>
                                    <p class="regular-price">TK:{{$product->regular_price}}</p>
                                </div>

                                <button type="submit" class="main-btn primary-btn">
                                    <img src="{{asset('/')}}website/assets/images/icon-svg/cart-4.svg" alt="" />
                                    Add to cart
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Product Details Style 1 Part Ends ======-->

    <!--====== Reviews Part Start ======-->
    <section class="reviews-wrapper pt-100 pb-100">
        <div class="container">
            <div class="reviews-style">
                <div class="reviews-menu">
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
                                Details
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
                                Reviews
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a
                                id="specifications-tab"
                                data-toggle="tab"
                                href="#specifications"
                                role="tab"
                                aria-controls="specifications"
                                aria-selected="false"
                            >
                                specifications
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="tab-content" id="myTabContent">
                    <div
                        class="tab-pane fade"
                        id="home"
                        role="tabpanel"
                        aria-labelledby="home-tab"
                    >
                        <div class="details-wrapper">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="reviews-title">
                                        <h4 class="title">Oculus VR</h4>
                                    </div>
                                    <p class="mb-15 pt-30">{!! $product->long_description !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="tab-pane fade show active"
                        id="profile"
                        role="tabpanel"
                        aria-labelledby="profile-tab"
                    >
                        <div class="review-wrapper">
                            <div class="reviews-title">
                                <h4 class="title">Customer Reviews (38)</h4>
                            </div>

                            <div class="reviews-rating-wrapper flex-wrap">
                                <div class="reviews-rating-star">
                                    <p class="rating-review">
                                        <i class="mdi mdi-star"></i> <span>4.5</span> of 5
                                    </p>

                                    <div class="reviews-rating-bar">
                                        <div class="single-reviews-rating-bar">
                                            <p class="value">5 Starts</p>
                                            <div class="rating-bar-inner">
                                                <div class="bar-inner" style="width: 60%"></div>
                                            </div>
                                            <p class="percent">60%</p>
                                        </div>
                                    </div>
                                    <div class="reviews-rating-bar">
                                        <div class="single-reviews-rating-bar">
                                            <p class="value">4 Starts</p>
                                            <div class="rating-bar-inner">
                                                <div class="bar-inner" style="width: 20%"></div>
                                            </div>
                                            <p class="percent">20%</p>
                                        </div>
                                    </div>
                                    <div class="reviews-rating-bar">
                                        <div class="single-reviews-rating-bar">
                                            <p class="value">3 Starts</p>
                                            <div class="rating-bar-inner">
                                                <div class="bar-inner" style="width: 10%"></div>
                                            </div>
                                            <p class="percent">10%</p>
                                        </div>
                                    </div>
                                    <div class="reviews-rating-bar">
                                        <div class="single-reviews-rating-bar">
                                            <p class="value">2 Starts</p>
                                            <div class="rating-bar-inner">
                                                <div class="bar-inner" style="width: 5%"></div>
                                            </div>
                                            <p class="percent">05%</p>
                                        </div>
                                    </div>
                                    <div class="reviews-rating-bar">
                                        <div class="single-reviews-rating-bar">
                                            <p class="value">1 Starts</p>
                                            <div class="rating-bar-inner">
                                                <div class="bar-inner" style="width: 0"></div>
                                            </div>
                                            <p class="percent">0%</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="reviews-rating-form">
                                    <div class="rating-star">
                                        <p>Click on star to review</p>
                                        <ul id="stars" class="stars">
                                            <li class="star" data-value="1">
                                                <i class="mdi mdi-star"></i>
                                            </li>
                                            <li class="star" data-value="2">
                                                <i class="mdi mdi-star"></i>
                                            </li>
                                            <li class="star" data-value="3">
                                                <i class="mdi mdi-star"></i>
                                            </li>
                                            <li class="star" data-value="4">
                                                <i class="mdi mdi-star"></i>
                                            </li>
                                            <li class="star" data-value="5">
                                                <i class="mdi mdi-star"></i>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="rating-form">
                                        <form action="#">
                                            <div class="single-form form-default">
                                                <label>Write your Review</label>
                                                <div class="form-input">
                                                    <textarea placeholder="Your review here"></textarea>
                                                    <i class="mdi mdi-message-text-outline"></i>
                                                </div>
                                            </div>
                                            <div class="single-rating-form flex-wrap">
                                                <div class="rating-form-file">
                                                    <div class="file">
                                                        <input type="file" id="file-1" />
                                                        <label for="file-1"
                                                        ><i class="mdi mdi-camera"></i
                                                            ></label>
                                                    </div>
                                                    <div class="file">
                                                        <input type="file" id="file-1" />
                                                        <label for="file-1"
                                                        ><i class="mdi mdi-attachment"></i
                                                            ></label>
                                                    </div>
                                                </div>
                                                <div class="rating-form-btn">
                                                    <button class="main-btn primary-btn">
                                                        write a Review
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="reviews-btn flex-wrap">
                                <div class="reviews-btn-left">
                                    <div class="dropdown-style">
                                        <div class="dropdown dropdown-white">
                                            <button
                                                class="main-btn primary-btn"
                                                type="button"
                                                id="dropdownMenu-1"
                                                data-toggle="dropdown"
                                                aria-haspopup="true"
                                                aria-expanded="true"
                                            >
                                                All Stars (213) <i class="mdi mdi-chevron-down"></i>
                                            </button>

                                            <ul
                                                class="dropdown-menu sub-menu-bar"
                                                aria-labelledby="dropdownMenu-1"
                                            >
                                                <li><a href="#">Dropped Menu 1</a></li>
                                                <li><a href="#">Dropped Menu 2</a></li>
                                                <li><a href="#">Dropped Menu 3</a></li>
                                                <li><a href="#">Dropped Menu 4</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="dropdown-style">
                                        <div class="dropdown dropdown-white">
                                            <button
                                                class="main-btn primary-btn-border"
                                                type="button"
                                                id="dropdownMenu-1"
                                                data-toggle="dropdown"
                                                aria-haspopup="true"
                                                aria-expanded="true"
                                            >
                                                Sort by Latest <i class="mdi mdi-chevron-down"></i>
                                            </button>

                                            <ul
                                                class="dropdown-menu sub-menu-bar"
                                                aria-labelledby="dropdownMenu-1"
                                            >
                                                <li><a href="#">Dropped Menu 1</a></li>
                                                <li><a href="#">Dropped Menu 2</a></li>
                                                <li><a href="#">Dropped Menu 3</a></li>
                                                <li><a href="#">Dropped Menu 4</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="reviews-btn-right">
                                    <a href="#" class="main-btn">with photo (18)</a>
                                    <a href="#" class="main-btn">additional feedback (23)</a>
                                </div>
                            </div>

                            <div class="reviews-comment">
                                <ul class="comment-items">
                                    <li>
                                        <div class="single-review-comment">
                                            <div class="comment-user-info">
                                                <div class="comment-author">
                                                    <img
                                                        src="{{asset('/')}}website/assets/images/review/author-1.jpg"
                                                        alt=""
                                                    />
                                                </div>
                                                <div class="comment-content">
                                                    <h6 class="name">User Name</h6>

                                                    <p>
                                                        <i class="mdi mdi-star"></i>
                                                        <span class="rating"
                                                        ><strong>4</strong> of 5</span
                                                        >
                                                        <span class="date">20 Nov 2019 22:01</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="comment-user-text">
                                                <p>
                                                    Good headphones. The sound is clear. AND the bottoms
                                                    repyat and top ring. Currently are really not taken.
                                                    For me quiet. With my Beats of course can not be
                                                    compared. But for the money and definitely
                                                    recommend. The one who took happy as an elephant.
                                                    Product as advertised, looks good Quality, sound is
                                                    not the best but because of cost-benefit ratio it
                                                    seems very good to me, recommended the seller .
                                                </p>
                                                <ul class="comment-meta">
                                                    <li>
                                                        <i class="mdi mdi-thumb-up"></i> <span>31</span>
                                                    </li>
                                                    <li><a href="#">Like</a></li>
                                                    <li><a href="#">Replay</a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <ul class="comment-replay">
                                            <li>
                                                <div class="single-review-comment">
                                                    <div class="comment-user-info">
                                                        <div class="comment-author">
                                                            <img
                                                                src="{{asset('/')}}website/assets/images/review/author-2.jpg"
                                                                alt=""
                                                            />
                                                        </div>
                                                        <div class="comment-content">
                                                            <h6 class="name">User Name</h6>

                                                            <p>
                                                                <i class="mdi mdi-star"></i>
                                                                <span class="rating"
                                                                ><strong>4</strong> of 5</span
                                                                >
                                                                <span class="date">20 Nov 2019 22:01</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="comment-user-text">
                                                        <p>
                                                            Good headphones. The sound is clear. AND the
                                                            bottoms repyat and top ring. Currently are
                                                            really not taken.
                                                        </p>
                                                        <div class="comment-image flex-wrap">
                                                            <div class="image">
                                                                <img
                                                                    src="{{asset('/')}}website/assets/images/review/attachment-1.jpg"
                                                                    alt=""
                                                                />
                                                            </div>
                                                            <div class="image">
                                                                <img
                                                                    src="{{asset('/')}}website/assets/images/review/attachment-2.jpg"
                                                                    alt=""
                                                                />
                                                            </div>
                                                        </div>
                                                        <ul class="comment-meta">
                                                            <li>
                                                                <i class="mdi mdi-thumb-up"></i>
                                                                <span>31</span>
                                                            </li>
                                                            <li><a href="#">Like</a></li>
                                                            <li><a href="#">Replay</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="single-review-comment">
                                                    <div class="comment-user-info">
                                                        <div class="comment-author">
                                                            <img
                                                                src="{{asset('/')}}website/assets/images/review/author-3.jpg"
                                                                alt=""
                                                            />
                                                        </div>
                                                        <div class="comment-content">
                                                            <h6 class="name">User Name</h6>

                                                            <p>
                                                                <i class="mdi mdi-star"></i>
                                                                <span class="rating"
                                                                ><strong>4</strong> of 5</span
                                                                >
                                                                <span class="date">20 Nov 2019 22:01</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="comment-user-text">
                                                        <p>
                                                            Good headphones. The sound is clear. AND the
                                                            bottoms repyat and top ring. Currently are
                                                            really not taken.
                                                        </p>
                                                        <ul class="comment-meta">
                                                            <li>
                                                                <i class="mdi mdi-thumb-up"></i>
                                                                <span>31</span>
                                                            </li>
                                                            <li><a href="#">Like</a></li>
                                                            <li><a href="#">Replay</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <div class="single-review-comment">
                                            <div class="comment-user-info">
                                                <div class="comment-author">
                                                    <img
                                                        src="{{asset('/')}}website/assets/images/review/author-4.jpg"
                                                        alt=""
                                                    />
                                                </div>
                                                <div class="comment-content">
                                                    <h6 class="name">User Name</h6>

                                                    <p>
                                                        <i class="mdi mdi-star"></i>
                                                        <span class="rating"
                                                        ><strong>4</strong> of 5</span
                                                        >
                                                        <span class="date">20 Nov 2019 22:01</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="comment-user-text">
                                                <p>
                                                    Good headphones. The sound is clear. AND the bottoms
                                                    repyat and top ring. Currently are really not taken.
                                                    For me quiet. With my Beats of course can not be
                                                    compared. But for the money and definitely
                                                    recommend. The one who took happy as an elephant.
                                                    Product as advertised, looks good Quality, sound is
                                                    not the best but because of cost-benefit ratio it
                                                    seems very good to me, recommended the seller .
                                                </p>
                                                <ul class="comment-meta">
                                                    <li>
                                                        <i class="mdi mdi-thumb-up"></i> <span>31</span>
                                                    </li>
                                                    <li><a href="#">Like</a></li>
                                                    <li><a href="#">Replay</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div
                        class="tab-pane fade"
                        id="specifications"
                        role="tabpanel"
                        aria-labelledby="specifications-tab"
                    >
                        <div class="specifications-wrapper">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="reviews-title">
                                        <h4 class="title">Oculus VR</h4>
                                    </div>
                                    <p class="mb-15 pt-30">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Maxime quod sequi vitae atque perspiciatis voluptas
                                        recusandae explicabo ea dolores numquam ratione, obcaecati
                                        ullam, ipsam minima vero nostrum nesciunt facere
                                        laudantium? Facere animi rem veniam quibusdam nam sed ex
                                        maxime laboriosam a vero nesciunt tenetur, eius autem
                                        fugiat quod expedita dignissimos.
                                    </p>
                                    <p class="mb-30">
                                        Repellendus, doloribus illum expedita, dolorem voluptas
                                        doloremque voluptatibus, magni tempora laboriosam deserunt
                                        suscipit labore dolorum aperiam cum veniam accusamus?
                                        Consequatur dolore facere perferendis repellat, modi in
                                        consectetur ipsum atque quos natus.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Reviews Part Ends ======-->

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

    <script>
        document.querySelectorAll('.thumb-image').forEach(function(thumb) {
            thumb.addEventListener('click', function() {
                const mainImage = document.getElementById('main-image');
                mainImage.src = this.src;
            });
        });
    </script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sizeOptions = document.querySelectorAll('.size-option');
        const sizeInput = document.getElementById('selectedSize');

        sizeOptions.forEach(option => {
            option.addEventListener('click', () => {
                sizeOptions.forEach(opt => opt.classList.remove('active'));
                option.classList.add('active');

                sizeInput.value = option.getAttribute('data-size');
            });
        });
        const activeSize = document.querySelector('.size-option.active');
        if (activeSize) {
            sizeInput.value = activeSize.getAttribute('data-size');
        }
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const colorOptions = document.querySelectorAll('.color-select li');
        const colorInput = document.getElementById('selectedColor');

        colorOptions.forEach(option => {
            option.addEventListener('click', () => {
                colorOptions.forEach(opt => opt.classList.remove('active'));
                option.classList.add('active');
                colorInput.value = option.getAttribute('data-color');
            });
        });

        const activeColor = document.querySelector('.color-select li.active');
        if (activeColor) {
            colorInput.value = activeColor.getAttribute('data-color');
        }
    });
</script>

    </body>

@endsection
