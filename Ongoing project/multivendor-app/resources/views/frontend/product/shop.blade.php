@extends('layouts.main')

@section('main')
    <!-- rts navigation bar area start -->
    <div class="rts-navigation-area-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="navigator-breadcrumb-wrapper">
                        <a href="/">Home</a>
                        <i class="fa-regular fa-chevron-right"></i>
                        <a class="current" href="{{ route('shop.home') }}">Shop</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-seperator">
        <div class="container">
            <hr class="section-seperator">
        </div>
    </div>

    <!-- shop[ grid sidebar wrapper -->
    <div class="shop-grid-sidebar-area rts-section-gap">
        <div class="container">
            <div class="row g-0">
                <div class="col-xl-12 col-lg-12">
                    <div class="filter-select-area">
                        <div class="top-filter">
                            <span>{{ $products->links() }}</span>
                            <div class="right-end">
                                <span>Sort: Short By Latest</span>
                                <div class="button-tab-area">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link single-button active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect x="0.5" y="0.5" width="6" height="6" rx="1.5" stroke="#2C3B28"/>
                                                    <rect x="0.5" y="9.5" width="6" height="6" rx="1.5" stroke="#2C3B28"/>
                                                    <rect x="9.5" y="0.5" width="6" height="6" rx="1.5" stroke="#2C3B28"/>
                                                    <rect x="9.5" y="9.5" width="6" height="6" rx="1.5" stroke="#2C3B28"/>
                                                </svg>
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link single-button" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect x="0.5" y="0.5" width="6" height="6" rx="1.5" stroke="#2C3C28"/>
                                                    <rect x="0.5" y="9.5" width="6" height="6" rx="1.5" stroke="#2C3C28"/>
                                                    <rect x="9" y="3" width="7" height="1" fill="#2C3C28"/>
                                                    <rect x="9" y="12" width="7" height="1" fill="#2C3C28"/>
                                                </svg>
                                            </button>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                        <div class="nice-select-area-wrapper-and-button">
                            <div class="nice-select-wrapper-1">
                                <div class="single-select">
                                    <select>
                                        <option data-display="All Categories">All Categories</option>
                                        <option value="1">Some option</option>
                                        <option value="2">Another option</option>
                                        <option value="3" disabled>A disabled option</option>
                                        <option value="4">Potato</option>
                                    </select>
                                </div>
                                <div class="single-select">
                                    <select>
                                        <option data-display="All Brands">All Brands</option>
                                        <option value="1">Some option</option>
                                        <option value="2">Another option</option>
                                        <option value="3" disabled>A disabled option</option>
                                        <option value="4">Potato</option>
                                    </select>
                                </div>
                                <div class="single-select">
                                    <select>
                                        <option data-display="All Size">All Size </option>
                                        <option value="1">Some option</option>
                                        <option value="2">Another option</option>
                                        <option value="3" disabled>A disabled option</option>
                                        <option value="4">Potato</option>
                                    </select>
                                </div>
                                <div class="single-select">
                                    <select>
                                        <option data-display="All Weight">All Weight</option>
                                        <option value="1">Some option</option>
                                        <option value="2">Another option</option>
                                        <option value="3" disabled>A disabled option</option>
                                        <option value="4">Potato</option>
                                    </select>
                                </div>
                            </div>
                            <div class="button-area">
                                <button class="rts-btn">Filter</button>
                                <button class="rts-btn">Reset Filter</button>
                            </div>
                        </div>
                    </div>

                    <div class="tab-content" id="myTabContent">
                        <div class="product-area-wrapper-shopgrid-list mt--20 tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <div class="row g-4">
                                @foreach($products as $product)
                                    <div class="col-lg-20 col-lg-4 col-md-6 col-sm-12 col-12">
                                        <div class="single-shopping-card-one">
                                            <!-- iamge and sction area start -->
                                            <div class="image-and-action-area-wrapper">
                                                <a href="{{ route('single.product', ['product' => $product->id, 'slug' => $product->slug]) }}" class="thumbnail-preview">
                                                    @if($product->discount)
                                                        <div class="badge">
                                                            <span>{{ number_format((($product->price - $product->discount) / $product->price) * 100) }}% <br>
                                                                Off
                                                            </span>
                                                            <i class="fa-solid fa-bookmark"></i>
                                                        </div>
                                                    @endif
                                                    <img src="{{ asset($product->product_thumbnail) }}" alt="{{ $product->name }}">
                                                </a>
                                                <div class="action-share-option">
                                                    <div class="single-action openuptip message-show-action" data-flow="up" title="Add To Wishlist">
                                                        <i class="fa-light fa-heart"></i>
                                                    </div>
                                                    <div class="single-action openuptip" data-flow="up" title="Compare" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        <i class="fa-solid fa-arrows-retweet"></i>
                                                    </div>
                                                    <div class="single-action openuptip cta-quickview product-details-popup-btn" data-flow="up" title="Quick View" id="{{ $product->id }}" onclick="productView(this.id)">
                                                        <i class="fa-regular fa-eye"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- iamge and sction area start -->

                                            <div class="body-content">

                                                <a href="{{ route('single.product', ['product' => $product->id, 'slug' => $product->slug]) }}">
                                                    <h4 class="title">{{ $product->name }}</h4>
                                                </a>
                                                <span class="availability">500g Pack</span>
                                                <div class="price-area">
                                                    @if($product->discount)
                                                        <span class="current">${{ number_format($product->discount, 2) }}</span>
                                                        <div class="previous">${{ number_format($product->price, 2 ) }}</div>
                                                    @else
                                                        <span class="current">${{ number_format($product->price, 2) }}</span>
                                                    @endif
                                                </div>
                                                <div class="cart-counter-action">
                                                    <div class="quantity-edit">
                                                        <input type="text" class="input" value="1">
                                                        <div class="button-wrapper-action">
                                                            <button class="button"><i class="fa-regular fa-chevron-down"></i></button>
                                                            <button class="button plus">+<i class="fa-regular fa-chevron-up"></i></button>
                                                        </div>
                                                    </div>
                                                    <a href="#" class="rts-btn btn-primary radious-sm with-icon">
                                                        <div class="btn-text">
                                                            Add To Cart
                                                        </div>
                                                        <div class="arrow-icon">
                                                            <i class="fa-regular fa-cart-shopping"></i>
                                                        </div>
                                                        <div class="arrow-icon">
                                                            <i class="fa-regular fa-cart-shopping"></i>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="product-area-wrapper-shopgrid-list with-list mt--20 tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                            <div class="row">
                                @foreach($products as $product)
                                    <div class="col-lg-6">
                                        <div class="single-shopping-card-one discount-offer">
                                            <a href="{{ route('single.product', ['product' => $product->id, 'slug' => $product->slug]) }}" class="thumbnail-preview">
                                                @if($product->discount)
                                                    <div class="badge">
                                                            <span>{{ number_format((($product->price - $product->discount) / $product->price) * 100) }}% <br>
                                                                Off
                                                            </span>
                                                        <i class="fa-solid fa-bookmark"></i>
                                                    </div>
                                                @endif
                                                <img src="{{ asset($product->product_thumbnail) }}" alt="grocery">
                                            </a>
                                            <div class="body-content">
                                                <div class="title-area-left">
                                                    <a href="{{ route('single.product', ['product' => $product->id, 'slug' => $product->slug]) }}">
                                                        <h4 class="title">{{ $product->name }}</h4>
                                                    </a>
                                                    <span class="availability">500g Pack</span>
                                                    <div class="price-area">
                                                        @if($product->discount)
                                                            <span class="current">${{ number_format($product->discount, 2) }}</span>
                                                            <div class="previous">${{ number_format($product->price, 2 ) }}</div>
                                                        @else
                                                            <span class="current">${{ number_format($product->price, 2) }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="cart-counter-action">
                                                        <div class="quantity-edit">
                                                            <input type="text" class="input" value="1">
                                                            <div class="button-wrapper-action">
                                                                <button class="button"><i class="fa-regular fa-chevron-down"></i></button>
                                                                <button class="button plus">+<i class="fa-regular fa-chevron-up"></i></button>
                                                            </div>
                                                        </div>
                                                        <a href="#" class="rts-btn btn-primary radious-sm with-icon">
                                                            <div class="btn-text">
                                                                Add To Cart
                                                            </div>
                                                            <div class="arrow-icon">
                                                                <i class="fa-regular fa-cart-shopping"></i>
                                                            </div>
                                                            <div class="arrow-icon">
                                                                <i class="fa-regular fa-cart-shopping"></i>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="natural-value">
                                                    <h6 class="title">
                                                        Product Details
                                                    </h6>
                                                    <div class="single">
                                                        <span>Product Code:</span>
                                                        <span>{{ $product->product_code }}</span>
                                                    </div>
                                                    <div class="single">
                                                        <span>Category:</span>
                                                        <span>{{ $product->product_category->name }}</span>
                                                    </div>
                                                    <div class="single">
                                                        <span>Subcategory:</span>
                                                        <span>{{ $product->product_subcategory->name }}</span>
                                                    </div>
                                                    <div class="single">
                                                        <span>Brand:</span>
                                                        <span>{{ $product->brand->name }}</span>
                                                    </div>
                                                    <div class="single">
                                                        <span>Tags:</span>
                                                        <span>{{ $product->tags }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- shop[ grid sidebar wrapper end -->
@endsection
