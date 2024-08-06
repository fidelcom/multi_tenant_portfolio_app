<!-- header style two start -->
<header class="header-style-two header-four bg-primary-header header-primary-sticky header--fft">
    <div class="header-top-area bg_primary">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bwtween-area-header-top header-top-style-four">
                        <div class="hader-top-menu">
                            <a href="#">About Us</a>
                            <a href="#">My Account </a>
                            <a href="#">Wishlist</a>
                            <a href="#">Order Tracking</a>
                        </div>
                        <p>Welcome to our store Eko Marketplace!</p>
                        <div class="follow-us-social">
                            <span>Follow Us:</span>
                            <div class="social">
                                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                <a href="#"><i class="fa-regular fa-x"></i></a>
                                <a href="#"><i class="fa-brands fa-skype"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="search-header-area-main bg_white without-category">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="logo-search-category-wrapper">
                        <a href="/" class="logo-area">
                            <img src="{{ asset('frontend/assets/images/logo/logo-01.svg') }}" alt="logo-main" class="logo">
                        </a>
                        <div class="category-search-wrapper">
                            <div class="location-area">
                                <div class="icon">
                                    <i class="fa-light fa-location-dot"></i>
                                </div>
                                <div class="information">
                                    <span>Your location</span>
                                    <p>Select Location</p>
                                </div>
                            </div>
                            <form action="#" class="search-header">
                                <input type="text" placeholder="Search for products, categories" required="">
                                <a href="javascript: void(0);" class="rts-btn btn-primary radious-sm with-icon">
                                    <div class="btn-text">
                                        Search
                                    </div>
                                    <div class="arrow-icon">
                                        <i class="fa-light fa-magnifying-glass"></i>
                                    </div>
                                    <div class="arrow-icon">
                                        <i class="fa-light fa-magnifying-glass"></i>
                                    </div>
                                </a>
                            </form>
                        </div>
                        <div class="accont-wishlist-cart-area-header">
                            @if(\Illuminate\Support\Facades\Auth::user())
                                <a href="{{ route('dashboard') }}" class="btn-border-only account">
                                    <i class="fa-light fa-user"></i>
                                    Account
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="btn-border-only account">
                                    <i class="fa-light fa-user"></i>
                                    Login
                                </a>
                                <a href="{{ route('register') }}" class="btn-border-only account">
                                    <i class="fa-light fa-user"></i>
                                    Register
                                </a>
                            @endif
{{--                            <a href="wishlist.html" class="btn-border-only wishlist">--}}
{{--                                <i class="fa-regular fa-heart"></i>--}}
{{--                                Wishlist--}}
{{--                            </a>--}}
                            <div class="btn-border-only cart category-hover-header">
                                <i class="fa-sharp fa-regular fa-cart-shopping"></i>
                                <span>My Cart</span>
                                <div class="category-sub-menu card-number-show" id="miniCart">
                                    <h5 class="shopping-cart-number">Shopping Cart (03)</h5>
                                </div>
                                <a href="cart.html" class="over_link"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="rts-header-nav-area-one  header-four header--sticky">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="nav-and-btn-wrapper">
                        <div class="nav-area-bottom-left-header-four">
                            <div class="category-btn category-hover-header">
                                <!-- <img class="parent" src="assets/images/icons/bar-1.svg" alt="icons"> -->
                                <span>All Categories</span>
                                <ul class="category-sub-menu" id="category-active-four">
                                    @foreach(\App\Models\ProductCategory::orderBy('name', 'ASC')->get() as $category)
                                        <li>
                                            <a href="#" class="menu-item">
                                                <img src="{{ asset($category->image) }}" width="20" alt="icons">
                                                <span>{{ $category->name }}</span>
                                                <i class="fa-regular fa-plus"></i>
                                            </a>
                                            <ul class="submenu mm-collapse">
                                                @foreach($category->product_subcategory as $subcategory)
                                                    <li><a class="mobile-menu-link" href="{{ route('category.product', ['category' => $category->id, 'slug' => $category->slug]) }}">{{ $subcategory->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="nav-area">
                                <nav>
                                    <ul class="parent-nav">
                                        <li class="parent has-dropdown">
                                            <a class="nav-link" href="/">Home</a>
                                        </li>
                                        <li class="parent"><a href="about.html">About</a></li>
                                        <li class="parent with-megamenu">
                                            <a href="{{ route('shop.home') }}">Shop</a>
                                            <div class="rts-megamenu">
                                                <div class="wrapper">
                                                    <div class="row align-items-center">
                                                        <div class="col-lg-12">
                                                            <div class="megamenu-item-wrapper">
                                                                @foreach(\App\Models\ProductCategory::orderBy('name', 'ASC')->limit(6)->get() as $category)
                                                                <!-- single item areas start -->
                                                                <div class="single-megamenu-wrapper">
                                                                    <p class="title">{{ $category->name }}</p>
                                                                    <ul>
                                                                        @foreach($category->product_subcategory as $subcategory)
                                                                        <li><a href="{{ route('subcategory.product', ['subcategory' => $subcategory->id, 'slug' => $subcategory->slug]) }}">{{ $subcategory->name }}</a></li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                                <!-- single item areas end -->
                                                                @endforeach
                                                                <!-- single item areas start -->
{{--                                                                <div class="single-megamenu-wrapper">--}}
{{--                                                                    <p class="title">Shop Others</p>--}}
{{--                                                                    <ul>--}}
{{--                                                                        <li><a class="sub-b" href="cart.html">Cart</a></li>--}}
{{--                                                                        <li><a class="sub-b" href="checkout.html">Checkout</a></li>--}}
{{--                                                                        <li><a class="sub-b" href="trackorder.html">Track Order</a></li>--}}
{{--                                                                    </ul>--}}
{{--                                                                </div>--}}
                                                                <!-- single item areas end -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="parent has-dropdown">
                                            <a class="nav-link" href="{{ route('shop.vendor.home') }}">Vendors</a>
{{--                                            <ul class="submenu">--}}
{{--                                                <li><a class="sub-b" href="vendor-list.html">Vendor List</a></li>--}}
{{--                                                <li><a class="sub-b" href="vendor-grid.html">Vendor Grid</a></li>--}}
{{--                                                <li><a class="sub-b" href="vendor-details.html">Vendor Details</a></li>--}}
{{--                                            </ul>--}}
                                        </li>
                                        <li class="parent has-dropdown">
                                            <a class="nav-link" href="#">Brands</a>
                                            <ul class="submenu">
                                                @foreach(\App\Models\Brand::orderBy('name', 'ASC')->get() as $brand)
                                                    <li><a class="sub-b" href="{{ route('brand.product', ['brand' => $brand->id, 'slug' => $brand->slug]) }}">{{ $brand->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li class="parent has-dropdown">
                                            <a class="nav-link" href="#">Pages</a>
                                            <ul class="submenu">
                                                <li><a class="sub-b" href="about.html">About</a></li>
                                                <li><a class="sub-b" href="store.html">Store</a></li>
                                                <li><a class="sub-b" href="faq.html">Faq's</a></li>
                                                <li><a class="sub-b" href="invoice.html">Invoice</a></li>
                                                <li><a class="sub-b" href="contact.html">Contact</a></li>
                                                <li><a class="sub-b" href="register.html">Register</a></li>
                                                <li><a class="sub-b" href="login.html">Login</a></li>
                                                <li><a class="sub-b" href="privacy-policy.html">Privacy Policy</a></li>
                                                <li><a class="sub-b" href="cookies-policy.html">Cookies Policy</a></li>
                                                <li><a class="sub-b" href="terms-condition.html">Terms & Condition</a></li>
                                                <li><a class="sub-b" href="404.html">Error</a></li>
                                            </ul>
                                        </li>
                                        <li class="parent has-dropdown">
                                            <a class="nav-link" href="#">Blog</a>
                                            <ul class="submenu">
                                                <li><a class="sub-b" href="blog.html">Blog</a></li>
                                                <li><a class="sub-b" href="blog-list-left-sidebar.html">Blog List Right Sidebar</a></li>
                                                <li><a class="sub-b" href="blog-list-right-sidebar.html">Blog List Left Sidebar</a></li>
                                                <li><a class="sub-b" href="blog-details.html">Blog Details</a></li>
                                            </ul>
                                        </li>
                                        <li class="parent"><a href="contact.html">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <!-- button-area -->
{{--                        <div class="right-location-area fourt">--}}
{{--                            <p>Get 30% Discount Now <span>Sale</span></p>--}}
{{--                        </div>--}}
                        <!-- button-area end -->
                    </div>
                    <div class="logo-search-category-wrapper">
                        <a href="/" class="logo-area">
                            <img src="{{ asset('frontend/assets/images/logo/logo-01.svg') }}" alt="logo-main" class="logo">
                        </a>
                        <div class="category-search-wrapper">
                            <div class="category-btn category-hover-header">
                                <img class="parent" src="assets/images/icons/bar-1.svg" alt="icons">
                                <span class="cts">All Categories</span>
                                <ul class="category-sub-menu">
                                    @foreach(\App\Models\ProductCategory::orderBy('name', 'ASC')->get() as $category)
                                        <li>
                                            <a href="#" class="menu-item">
                                                <img src="{{ asset($category->image) }}" width="20" alt="icons">
                                                <span>{{ $category->name }}</span>
                                                <i class="fa-regular fa-plus"></i>
                                            </a>
                                            <ul class="submenu mm-collapse">
                                                @foreach($category->product_subcategory as $subcategory)
                                                    <li><a class="mobile-menu-link" href="{{ route('category.product', ['category' => $category->id, 'slug' => $category->slug]) }}">{{ $subcategory->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <form action="#" class="search-header">
                                <input type="text" placeholder="Search for products, categories" required="">
                                <a href="javascript: void(0);" class="rts-btn btn-primary radious-sm with-icon">
                                    <div class="btn-text">
                                        Search
                                    </div>
                                    <div class="arrow-icon">
                                        <i class="fa-light fa-magnifying-glass"></i>
                                    </div>
                                    <div class="arrow-icon">
                                        <i class="fa-light fa-magnifying-glass"></i>
                                    </div>
                                </a>
                            </form>
                        </div>
                        <div class="main-wrapper-action-2 d-flex">
                            <div class="accont-wishlist-cart-area-header">
                                @if(\Illuminate\Support\Facades\Auth::user())
                                    <a href="account.html" class="btn-border-only account">
                                        <i class="fa-light fa-user"></i>
                                        Account
                                    </a>
                                @else
                                    <a href="account.html" class="btn-border-only account">
                                        <i class="fa-light fa-user"></i>
                                        Login
                                    </a>
                                    <a href="{{ route('register') }}" class="btn-border-only account">
                                        <i class="fa-light fa-user"></i>
                                        Register
                                    </a>
                                @endif
{{--                                <a href="wishlist.html" class="btn-border-only wishlist">--}}
{{--                                    <i class="fa-regular fa-heart"></i>--}}
{{--                                    Wishlist--}}
{{--                                </a>--}}
                                <div class="btn-border-only cart category-hover-header">
                                    <i class="fa-sharp fa-regular fa-cart-shopping"></i>
                                    <span>My Cart</span>
                                    <div class="category-sub-menu card-number-show" id="miniCart2">
                                        <h5 class="shopping-cart-number">Shopping Cart (03)</h5>
                                        <div class="sub-total-cart-balance">
                                            <div class="bottom-content-deals mt--10">
                                                <div class="top">
                                                    <span>Sub Total:</span>
                                                    <span class="number-c">$108.00</span>
                                                </div>
                                                <div class="single-progress-area-incard">
                                                    <div class="progress">
                                                        <div class="progress-bar wow fadeInLeft" role="progressbar" style="width: 80%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <p>Spend More <span>$125.00</span> to reach <span>Free Shipping</span></p>
                                            </div>
                                            <div class="button-wrapper d-flex align-items-center justify-content-between">
                                                <a href="cart.html" class="rts-btn btn-primary ">View Cart</a>
                                                <a href="checkout.html" class="rts-btn btn-primary border-only">CheckOut</a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="cart.html" class="over_link"></a>
                                </div>
                            </div>
                            <div class="actions-area">
                                <div class="search-btn" id="search">

                                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.75 14.7188L11.5625 10.5312C12.4688 9.4375 12.9688 8.03125 12.9688 6.5C12.9688 2.9375 10.0312 0 6.46875 0C2.875 0 0 2.9375 0 6.5C0 10.0938 2.90625 13 6.46875 13C7.96875 13 9.375 12.5 10.5 11.5938L14.6875 15.7812C14.8438 15.9375 15.0312 16 15.25 16C15.4375 16 15.625 15.9375 15.75 15.7812C16.0625 15.5 16.0625 15.0312 15.75 14.7188ZM1.5 6.5C1.5 3.75 3.71875 1.5 6.5 1.5C9.25 1.5 11.5 3.75 11.5 6.5C11.5 9.28125 9.25 11.5 6.5 11.5C3.71875 11.5 1.5 9.28125 1.5 6.5Z" fill="#1F1F25"></path>
                                    </svg>

                                </div>
                                <div class="menu-btn" id="menu-btn">

                                    <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect y="14" width="20" height="2" fill="#1F1F25"></rect>
                                        <rect y="7" width="20" height="2" fill="#1F1F25"></rect>
                                        <rect width="20" height="2" fill="#1F1F25"></rect>
                                    </svg>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>
<!-- header style two end -->


<!-- rts header area start -->
<!-- header style two -->
<div id="side-bar" class="side-bar header-two">
    <button class="close-icon-menu"><i class="far fa-times"></i></button>


    <form action="#" class="search-input-area-menu mt--30">
        <input type="text" placeholder="Search..." required>
        <button><i class="fa-light fa-magnifying-glass"></i></button>
    </form>

    <div class="mobile-menu-nav-area tab-nav-btn mt--20">

        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Menu</button>
                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Category</button>
            </div>
        </nav>

        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                <!-- mobile menu area start -->
                <div class="mobile-menu-main">
                    <nav class="nav-main mainmenu-nav mt--30">
                        <ul class="mainmenu metismenu" id="mobile-menu-active">
                            <li class="has-droupdown">
                                <a href="/" class="main">Home</a>
                            </li>
                            <li>
                                <a href="about.html" class="main">About</a>
                            </li>
                            <li class="has-droupdown">
                                <a href="#" class="main">Pages</a>
                                <ul class="submenu mm-collapse">
                                    <li><a class="mobile-menu-link" href="about.html">About</a></li>
                                    <li><a class="mobile-menu-link" href="faq.html">Faq's</a></li>
                                    <li><a class="mobile-menu-link" href="invoice.html">Invoice</a></li>
                                    <li><a class="mobile-menu-link" href="contact.html">Contact</a></li>
                                    <li><a class="mobile-menu-link" href="register.html">Register</a></li>
                                    <li><a class="mobile-menu-link" href="login.html">Login</a></li>
                                    <li><a class="mobile-menu-link" href="privacy-policy.html">Privacy Policy</a></li>
                                    <li><a class="mobile-menu-link" href="cookies-policy.html">Cookies Policy</a></li>
                                    <li><a class="mobile-menu-link" href="terms-condition.html">Terms Condition</a></li>
                                    <li><a class="mobile-menu-link" href="404.html">Error Page</a></li>
                                </ul>
                            </li>
                            <li class="has-droupdown">
                                <a href="{{ route('shop.home') }}" class="main">Shop</a>
                                <ul class="submenu mm-collapse">
                                    <li class="has-droupdown third-lvl">
                                        <a class="main" href="#">Shop Layout</a>
                                        <ul class="submenu-third-lvl mm-collapse">
                                            <li><a href="shop-grid-sidebar.html"></a>Shop Grid Sidebar</li>
                                            <li><a href="shop-list-sidebar.html"></a>Shop List Sidebar</li>
                                            <li><a href="shop-grid-top-filter.html"></a>Shop Grid Top Filter</li>
                                            <li><a href="shop-list-top-filter.html"></a>Shop List Top Filter</li>
                                        </ul>
                                    </li>
                                    <li class="has-droupdown third-lvl">
                                        <a class="main" href="#">Shop Details</a>
                                        <ul class="submenu-third-lvl mm-collapse">
                                            <li><a href="shop-details.html"></a>Shop Details</li>
                                            <li><a href="shop-details-2.html"></a>Shop Details 2</li>
                                            <li><a href="shop-grid-top-filter.html"></a>Shop Grid Top Filter</li>
                                            <li><a href="shop-list-top-filter.html"></a>Shop List Top Filter</li>
                                        </ul>
                                    </li>
                                    <li class="has-droupdown third-lvl">
                                        <a class="main" href="#">Product Feature</a>
                                        <ul class="submenu-third-lvl mm-collapse">
                                            <li><a href="shop-details-variable.html"></a>Shop Details Variable</li>
                                            <li><a href="shop-details-affiliats.html"></a>Shop Details Affiliats</li>
                                            <li><a href="shop-details-group.html"></a>Shop Details Group</li>
                                            <li><a href="shop-compare.html"></a>Shop Compare</li>
                                        </ul>
                                    </li>
                                    <li class="has-droupdown third-lvl">
                                        <a class="main" href="#">Shop Others</a>
                                        <ul class="submenu-third-lvl mm-collapse">
                                            <li><a href="cart.html"></a>Cart</li>
                                            <li><a href="checkout.html"></a>Checkout</li>
                                            <li><a href="trackorder.html"></a>Trackorder</li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-droupdown">
                                <a href="#" class="main">Blog</a>
                                <ul class="submenu mm-collapse">
                                    <li><a class="mobile-menu-link" href="blog.html">Blog</a></li>
                                    <li><a class="mobile-menu-link" href="blog-list-left-sidebar.html">Blog Left Sidebar</a></li>
                                    <li><a class="mobile-menu-link" href="blog-list-right-sidebar.html">Blog List Right Sidebar</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="contact.html" class="main">Contact Us</a>
                            </li>
                        </ul>
                    </nav>

                </div>
                <!-- mobile menu area end -->
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                <div class="category-btn category-hover-header menu-category">
                    <ul class="category-sub-menu" id="category-active-menu">
                        <li>
                            <a href="#" class="menu-item">
                                <img src="assets/images/icons/01.svg" alt="icons">
                                <span>Breakfast &amp; Dairy</span>
                                <i class="fa-regular fa-plus"></i>
                            </a>
                            <ul class="submenu mm-collapse">
                                <li><a class="mobile-menu-link" href="#">Breakfast</a></li>
                                <li><a class="mobile-menu-link" href="#">Dinner</a></li>
                                <li><a class="mobile-menu-link" href="#"> Pumking</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="menu-item">
                                <img src="assets/images/icons/02.svg" alt="icons">
                                <span>Meats &amp; Seafood</span>
                                <i class="fa-regular fa-plus"></i>
                            </a>
                            <ul class="submenu mm-collapse">
                                <li><a class="mobile-menu-link" href="#">Breakfast</a></li>
                                <li><a class="mobile-menu-link" href="#">Dinner</a></li>
                                <li><a class="mobile-menu-link" href="#"> Pumking</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="menu-item">
                                <img src="assets/images/icons/03.svg" alt="icons">
                                <span>Breads &amp; Bakery</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="menu-item">
                                <img src="assets/images/icons/04.svg" alt="icons">
                                <span>Chips &amp; Snacks</span>
                                <i class="fa-regular fa-plus"></i>
                            </a>
                            <ul class="submenu mm-collapse">
                                <li><a class="mobile-menu-link" href="#">Breakfast</a></li>
                                <li><a class="mobile-menu-link" href="#">Dinner</a></li>
                                <li><a class="mobile-menu-link" href="#"> Pumking</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="menu-item">
                                <img src="assets/images/icons/05.svg" alt="icons">
                                <span>Medical Healthcare</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="menu-item">
                                <img src="assets/images/icons/06.svg" alt="icons">
                                <span>Breads &amp; Bakery</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="menu-item">
                                <img src="assets/images/icons/07.svg" alt="icons">
                                <span>Biscuits &amp; Snacks</span>
                                <i class="fa-regular fa-plus"></i>
                            </a>
                            <ul class="submenu mm-collapse">
                                <li><a class="mobile-menu-link" href="#">Breakfast</a></li>
                                <li><a class="mobile-menu-link" href="#">Dinner</a></li>
                                <li><a class="mobile-menu-link" href="#"> Pumking</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="menu-item">
                                <img src="assets/images/icons/08.svg" alt="icons">
                                <span>Frozen Foods</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="menu-item">
                                <img src="assets/images/icons/09.svg" alt="icons">
                                <span>Grocery &amp; Staples</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="menu-item">
                                <img src="assets/images/icons/10.svg" alt="icons">
                                <span>Other Items</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>

    <!-- button area wrapper start -->
    <div class="button-area-main-wrapper-menuy-sidebar mt--50">
        <div class="contact-area">
            <div class="phone">
                <i class="fa-light fa-headset"></i>
                <a href="#">02345697871</a>
            </div>
            <div class="phone">
                <i class="fa-light fa-envelope"></i>
                <a href="#">02345697871</a>
            </div>
        </div>
        <div class="buton-area-bottom">
            <a href="{{ route('login') }}" class="rts-btn btn-primary">Sign In</a>
            <a href="{{ route('register') }}" class="rts-btn btn-primary">Sign Up</a>
        </div>
    </div>
    <!-- button area wrapper end -->

</div>
<!-- header style two End -->
