<!--====== Preloader Part Start ======-->
<div class="preloader">
    <div class="loader">
        <div class="ytp-spinner">
            <div class="ytp-spinner-container">
                <div class="ytp-spinner-rotator">
                    <div class="ytp-spinner-left">
                        <div class="ytp-spinner-circle"></div>
                    </div>
                    <div class="ytp-spinner-right">
                        <div class="ytp-spinner-circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--====== Preloader Part Ends ======-->

<!--====== Navbar Style 7 Part Start ======-->
<div class="navigation">
    <header class="menu-style-7 position-relative">
        <div class="navbar-container navbar-sidebar-7">
            <!-- navbar top Start -->
            <div class="navbar-top-wrapper">
                <div class="container-lg">
                    <div class="navbar-top d-flex justify-content-between">
                        <!-- navbar top left Start -->
                        <div class="navbar-top-left">
                            <ul class="navbar-top-link">
                                <li><a href="#0">About</a></li>
                                <li><a href="#0">Help</a></li>
                                <li><a href="#0">Contact</a></li>
                                <li class="d-none d-md-block">
                                    <a href="#0"
                                    ><i class="mdi mdi-phone-in-talk"></i> +8801234567890</a
                                    >
                                </li>
                            </ul>
                        </div>
                        <!-- navbar top left Ends -->
                        <!-- navbar top right Start -->
                        <div class="navbar-top-right">
                            <ul class="navbar-top-link">
                                <li>
                                    <select>
                                        <option value="0" selected>$ USD</option>
                                        <option value="1">€ EURO</option>
                                        <option value="2">$ CAD</option>
                                        <option value="3">₹ INR</option>
                                        <option value="4">¥ CNY</option>
                                        <option value="5">৳ BDT</option>
                                    </select>
                                </li>
                                <li>
                                    <select>
                                        <option value="0" selected>English</option>
                                        <option value="1">Español</option>
                                        <option value="2">Filipino</option>
                                        <option value="3">Français</option>
                                        <option value="4">العربية</option>
                                        <option value="5">हिन्दी</option>
                                        <option value="6">বাংলা</option>
                                    </select>
                                </li>
                                @if (Session('customerId'))
                                    <li>
                                        <a href="{{ route('customer.dashboard') }}"><i class="mdi mdi-account"></i>Wellcome{{ Session('customerName') }}</a>
                                    </li>
                                    <li>
                                        <a href=""><i class="mdi mdi-logout"></i>Sign Out</a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{route('customer.login')}}"><i class="mdi mdi-account"></i>Login</a>
                                    </li>
                                    <li>
                                        <a href="{{route('customer.register')}}"><i class="mdi mdi-account-box"></i> Register</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                        <!-- navbar top right Ends -->
                    </div>
                </div>
            </div>
            <!-- navbar top Ends -->

            <!-- main navbar Start -->
            <div class="navbar-wrapper">
                <div class="container-lg">
                    <nav
                        class="main-navbar d-lg-flex justify-content-between align-items-center"
                    >
                        <!-- desktop logo Start -->
                        <div class="desktop-logo d-lg-block">
                            <a href="{{ route('home') }}"
                            ><img src="{{asset('/')}}website/assets/images/logo.svg" alt="Logo"
                                /></a>
                        </div>
                        <!-- desktop logo Ends -->
                        <div class="navbar-menu-toggle d-lg-block">
                            <button id="toggle-menu-6" class="menu-toggle">
                                <span class="toggle-icon"></span>
                                <span class="toggle-icon"></span>
                                <span class="toggle-icon"></span>
                            </button>
                        </div>
                        <!-- navbar menu Start -->
                        <div class="navbar-menu">
                            <ul class="main-menu">
                                <div class="navbar-close d-lg-none text-right mb-3">
                                    <a href="#0" id="menu-close">
                                        <i class="mdi mdi-close"></i>
                                    </a>
                                </div>
                                <li class="menu-item-has-children">
                                    <a href="#0" class="collapsed" data-toggle="collapse" data-target="#allCategories"
                                       aria-controls="allCategories" aria-expanded="false" aria-label="Toggle navigation">
                                        All Categories <i class="lni lni-search-alt"></i>
                                    </a>
                                    <ul class="collapse sub-menu" id="allCategories">
                                        @foreach ($categories as $category)
                                            <li class="menu-item-has-children">
                                                <a href="{{ route('estore',$category->id) }}">
                                                    @if (count($category->subCategories)>0)
                                                    <i class="lni lni-menu"></i>
                                                    @endif

                                                     {{ $category->name }}
                                                </a>

                                                @if ($category->subcategories->count() > 0)
                                                    <ul class="sub-menu">
                                                        @foreach ($category->subcategories as $subCategory)
                                                            <li>
                                                                <a href="{{ route('subCategory.estore',$subCategory->id) }}">{{ $subCategory->name }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>

                                <li class="position-static menu-item-has-children">
                                    <a
                                        href="#0"
                                        class="collapsed"
                                        data-toggle="collapse"
                                        data-target="#menuVertical7-1"
                                        aria-controls="menuVertical7-1"
                                        aria-expanded="false"
                                        aria-label="Toggle navigation">Womens <i class="mdi mdi-chevron-right"></i>
                                    </a>
                                    <!-- sub mega dropdown Start -->
                                    <ul
                                        class="sub-mega-dropdown collapse"
                                        id="menuVertical7-1">
                                        <li>
                                            <div class="mega-dropdown-menu">
                                                <ul class="container mega-dropdown d-flex flex-wrap">
                                                    <li class="mega-dropdown-list menu-item-has-children">
                                                        <h6
                                                            class="heading-6 font-weight-500 mega-title collapsed"
                                                            data-toggle="collapse"
                                                            data-target="#menuVertical7-2"
                                                            aria-controls="menuVertical7-2"
                                                            aria-expanded="false"
                                                            aria-label="Toggle navigation"
                                                        >
                                                            New Arrivals
                                                            <i class="mdi mdi-chevron-right"></i>
                                                        </h6>
                                                        <ul class="collapse" id="menuVertical7-2">
                                                            <li><a href="category.html">Dressess</a></li>
                                                            <li><a href="category.html">Jackets</a></li>
                                                            <li>
                                                                <a href="category.html"
                                                                >Hoodies & Sweatshirts</a
                                                                >
                                                            </li>
                                                            <li><a href="category.html">Sweaters</a></li>
                                                            <li>
                                                                <a href="category.html">Tops & Tees</a>
                                                            </li>
                                                            <li>
                                                                <a href="category.html">Party Dressess</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                    <!-- sub mega dropdown Ends -->
                                </li>
                                <li><a href="category.html">mens</a></li>
                                <li><a href="category.html">Kids</a></li>
                                <li><a href="category.html">Accessories</a></li>
                                <li class="menu-item-has-children">
                                    <a
                                        href="#0"
                                        class="collapsed"
                                        data-toggle="collapse"
                                        data-target="#menuVertical7-5"
                                        aria-controls="menuVertical7-5"
                                        aria-expanded="false"
                                        aria-label="Toggle navigation"
                                    >Pages <i class="mdi mdi-chevron-right"></i
                                        ></a>
                                    <!-- sub menu Start -->
                                    <ul class="sub-menu collapse" id="menuVertical7-5">
                                        <li><a href="about-page.html">About Page</a></li>
                                        <li><a href="account-page.html">Account Page</a></li>
                                        <li><a href="cart-page.html">Cart Page</a></li>
                                        <li><a href="category.html">Category Page</a></li>
                                        <li><a href="checkout-page.html">Checkout Page</a></li>
                                        <li><a href="contact-page.html">Contact Page</a></li>
                                        <li><a href="login-page.html">Log In Page</a></li>
                                        <li>
                                            <a href="product-details-page.html"
                                            >Product Details Page</a
                                            >
                                        </li>
                                        <li><a href="signup-page.html">Sign Up Page</a></li>
                                    </ul>
                                    <!-- sub menu Ends -->
                                </li>
                            </ul>
                        </div>
                        <!-- navbar menu Ends -->
                        <div class="navbar-search-cart d-none d-lg-flex">
                            <!-- navbar search start -->
                            <div class="navbar-search search-style-5">
                                <div class="search-select">
                                    <div class="select-position">
                                        <select id="select26">
                                            <option value="" selected>All</option>
                                            <option value="1">option 01</option>
                                            <option value="2">option 02</option>
                                            <option value="3">option 03</option>
                                            <option value="4">option 04</option>
                                            <option value="5">option 05</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="search-input">
                                    <input type="text" placeholder="Search" />
                                </div>
                                <div class="search-btn">
                                    <button><i class="lni lni-search-alt"></i></button>
                                </div>
                            </div>
                            <!-- navbar search Ends -->
                            <!-- navbar cart start -->
                            <div class="navbar-cart">
                                <a
                                    class="icon-btn primary-icon-text icon-text-btn"
                                    href="#0"
                                ><img
                                        src="{{asset('/')}}website/assets/images/icon-svg/cart-1.svg"
                                        alt="Icon"
                                    /><span class="icon-text text-style-1">88</span></a
                                >

                                <div class="navbar-cart-dropdown">
                                    <div class="checkout-style-2">
                                        <div
                                            class="checkout-header d-flex justify-content-between"
                                        >
                                            <h6 class="title">Shopping Cart</h6>
                                        </div>

                                        <div class="checkout-table">
                                            <table class="table">
                                                <tbody>
                                                <tr>
                                                    <td class="checkout-product">
                                                        <div class="product-cart d-flex">
                                                            <div class="product-thumb">
                                                                <img
                                                                    src="{{asset('/')}}website/assets/images/product-cart/product-1.png"
                                                                    alt="Product"
                                                                />
                                                            </div>
                                                            <div class="product-content media-body">
                                                                <h5 class="title">
                                                                    <a href="#0">Hollow Port</a>
                                                                </h5>
                                                                <ul>
                                                                    <li><span>Brown</span></li>
                                                                    <li><span>XL</span></li>
                                                                    <li>
                                                                        <a class="delete" href="#0"
                                                                        ><i class="mdi mdi-delete"></i
                                                                            ></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="checkout-quantity">
                                                        <div class="product-quantity d-inline-flex">
                                                            <button type="button" id="sub" class="sub">
                                                                <i class="mdi mdi-minus"></i>
                                                            </button>
                                                            <input type="text" value="1" />
                                                            <button type="button" id="add" class="add">
                                                                <i class="mdi mdi-plus"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                    <td class="checkout-price">
                                                        <p class="price">$36.00</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="checkout-product">
                                                        <div class="product-cart d-flex">
                                                            <div class="product-thumb">
                                                                <img
                                                                    src="{{asset('/')}}website/assets/images/product-cart/product-2.png"
                                                                    alt="Product"
                                                                />
                                                            </div>
                                                            <div class="product-content media-body">
                                                                <h5 class="title">
                                                                    <a href="#0">Mist Black Triblend</a>
                                                                </h5>
                                                                <ul>
                                                                    <li><span>Brown</span></li>
                                                                    <li><span>XL</span></li>
                                                                    <li>
                                                                        <a class="delete" href="#0"
                                                                        ><i class="mdi mdi-delete"></i
                                                                            ></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="checkout-quantity">
                                                        <div class="product-quantity d-inline-flex">
                                                            <button type="button" id="sub" class="sub">
                                                                <i class="mdi mdi-minus"></i>
                                                            </button>
                                                            <input type="text" value="1" />
                                                            <button type="button" id="add" class="add">
                                                                <i class="mdi mdi-plus"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                    <td class="checkout-price">
                                                        <p class="price">$36.00</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="checkout-product">
                                                        <div class="product-cart d-flex">
                                                            <div class="product-thumb">
                                                                <img
                                                                    src="{{asset('/')}}website/assets/images/product-cart/product-3.png"
                                                                    alt="Product"
                                                                />
                                                            </div>
                                                            <div class="product-content media-body">
                                                                <h5 class="title">
                                                                    <a href="#0">Realm Bone</a>
                                                                </h5>
                                                                <ul>
                                                                    <li><span>Brown</span></li>
                                                                    <li><span>XL</span></li>
                                                                    <li>
                                                                        <a class="delete" href="#0"
                                                                        ><i class="mdi mdi-delete"></i
                                                                            ></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="checkout-quantity">
                                                        <div class="product-quantity d-inline-flex">
                                                            <button type="button" id="sub" class="sub">
                                                                <i class="mdi mdi-minus"></i>
                                                            </button>
                                                            <input type="text" value="1" />
                                                            <button type="button" id="add" class="add">
                                                                <i class="mdi mdi-plus"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                    <td class="checkout-price">
                                                        <p class="price">$36.00</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="checkout-product">
                                                        <div class="product-cart d-flex">
                                                            <div class="product-thumb">
                                                                <img
                                                                    src="{{asset('/')}}website/assets/images/product-cart/product-4.png"
                                                                    alt="Product"
                                                                />
                                                            </div>
                                                            <div class="product-content media-body">
                                                                <h5 class="title">
                                                                    <a href="#0">Circular Sienna</a>
                                                                </h5>
                                                                <ul>
                                                                    <li><span>Brown</span></li>
                                                                    <li><span>XL</span></li>
                                                                    <li>
                                                                        <a class="delete" href="#0"
                                                                        ><i class="mdi mdi-delete"></i
                                                                            ></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="checkout-quantity">
                                                        <div class="product-quantity d-inline-flex">
                                                            <button type="button" id="sub" class="sub">
                                                                <i class="mdi mdi-minus"></i>
                                                            </button>
                                                            <input type="text" value="1" />
                                                            <button type="button" id="add" class="add">
                                                                <i class="mdi mdi-plus"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                    <td class="checkout-price">
                                                        <p class="price">$36.00</p>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="checkout-footer">
                                            <div
                                                class="checkout-sub-total d-flex justify-content-between"
                                            >
                                                <p class="value">Subotal Price:</p>
                                                <p class="price">$144</p>
                                            </div>
                                            <div class="checkout-btn">
                                                <a href="#0" class="main-btn primary-btn-border"
                                                >View Cart</a
                                                >
                                                <a href="#0" class="main-btn primary-btn"
                                                >Checkout</a
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- navbar cart Ends -->
                        </div>
                    </nav>
                </div>
            </div>
            <!-- main navbar Ends -->
        </div>
        <div class="overlay-7"></div>
    </header>
</div>
<!--====== Navbar Style 7 Part Ends ======-->
