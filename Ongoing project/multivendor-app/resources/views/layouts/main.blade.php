<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ekomart-Grocery-Store(e-Commerce) HTML Template: A sleek, responsive, and user-friendly HTML template designed for online grocery stores.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Grocery, Store, stores">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Eko-Market-Place(e-Commerce) </title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/images/fav.png') }}">
    <!-- plugins css -->
    <link rel="stylesheet preload" href="{{ asset('frontend/assets/css/plugins.css') }}" as="style">
    <link rel="stylesheet preload" href="{{ asset('frontend/assets/css/style.css') }}" as="style">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

</head>
<body class="{{ Route::currentRouteName() == 'home' ? 'index-bg-gray' : 'shop-grid-top' }}">

@include('frontend.body.header')
<!-- rts header area end -->

@yield('main')

@include('frontend.body.footer')

<!-- modal -->
@if(Route::currentRouteName() == 'home')
    <div id="myModal-1" class="modal fade" role="dialog">
        <div class="modal-dialog bg_image">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-bs-dismiss="modal"><i class="fa-light fa-x"></i></button>
                </div>
                <div class="modal-body text-center">
                    <div class="inner-content">
                        <div class="content">
                            <span class="pre-title">Get up to 30% off on your first $150 purchase</span>
                            <h1 class="title">Feed Your Family at the  <br>
                                Best Price</h1>
                            <p class="disc">
                                We have prepared special discounts for you on grocery products. Don't <br> miss these opportunities...
                            </p>
                            <div class="rts-btn-banner-area">
                                <a href="#" class="rts-btn btn-primary radious-sm with-icon">
                                    <div class="btn-text">
                                        Shop Now
                                    </div>
                                    <div class="arrow-icon">
                                        <i class="fa-light fa-arrow-right"></i>
                                    </div>
                                    <div class="arrow-icon">
                                        <i class="fa-light fa-arrow-right"></i>
                                    </div>
                                </a>
                                <div class="price-area">
                                            <span>
                                                from
                                            </span>
                                    <h3 class="title animated fadeIn">$80.99</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

<div class="product-details-popup-wrapper">
    <div class="rts-product-details-section rts-product-details-section2 product-details-popup-section">
        <div class="product-details-popup">
            <button class="product-details-close-btn"><i class="fal fa-times"></i></button>
            <div class="details-product-area">
                <div class="product-thumb-area" id="imageArea">
                    <div class="cursor"></div>
                    <div class="thumb-wrapper one filterd-items figure">
                        <div class="product-thumb zoom" onmousemove="zoom(event)"
                             style="background-image: url(assets/images/products/product-details.jpg)"><img
                                src="" id="pimage" alt="product-thumb">
                        </div>
                    </div>

                    <div class="product-thumb-filter-group" id="baseImageArea">
                        <div class="thumb-filter filter-btn active" data-show=".one"><img
                                src="" id="pimage2" alt="product-thumb-filter"></div>
                    </div>
                </div>
                <div class="contents">
                    <div class="product-status">
                        <span class="product-catagory" id="pcategory"></span>
                        <div class="rating-stars-group">
                            <div class="rating-star"><i class="fas fa-star"></i></div>
                            <div class="rating-star"><i class="fas fa-star"></i></div>
                            <div class="rating-star"><i class="fas fa-star-half-alt"></i></div>
                            <span>10 Reviews</span>
                        </div>
                    </div>
                    <h2 class="product-title" ><span id="pname"></span> <span class="stock" id="available"></span><span class="stock" id="stockout"></span></h2>
                    <span class="product-price"><span id="pprice"></span> <span class="old-price" id="oldPrice"></span> </span>
                    <p id="pdesc">

                    </p>
                    <div class="product-bottom-action">
                        <div class="" id="sizeArea">
                            <label class="form-label" for="product_size">Size</label>
                            <select name="product_size" id="product_size">
                            </select>
                        </div>
                        <input type="hidden" id="product_id">
                        <div class="" id="colorArea">
                            <label for="color">Color</label>
                            <select name="pcolor" class="select" id="color">
                            </select>
                        </div>
                    </div>
                    <div class="product-bottom-action">
                        <div class="cart-edit">
                            <div class="quantity-edit action-item">
                                <button class="button"><i class="fal fa-minus minus"></i></button>
                                <input type="text" class="input" id="qty" value="01" min="1" />
                                <button class="button plus">+<i class="fal fa-plus plus"></i></button>
                            </div>
                        </div>
                        <a href="#" class="rts-btn btn-primary radious-sm with-icon" onclick="addToCart()">
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
                        <a href="javascript:void(0);" class="rts-btn btn-primary ml--20"><i class="fa-light fa-heart"></i></a>
                    </div>
                    <div class="product-uniques">
                        <span class="sku product-unipue"><span>Product Code: </span> <span id="pcode"></span></span>
                        <span class="catagorys product-unipue"><span>Category: </span> <span id="product_category"></span></span>
                        <span class="catagorys product-unipue"><span>Subcategory: </span> <span id="psubcategory"></span></span>
                        <span class="catagorys product-unipue"><span>Brand: </span> <span id="pbrand"></span></span>
                        <span class="tags product-unipue"><span>Tags: </span> <span id="ptags"></span></span>
                    </div>
                    <div class="share-social">
                        <span>Share:</span>
                        <a class="platform" href="http://facebook.com" target="_blank"><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="platform" href="http://twitter.com" target="_blank"><i
                                class="fab fa-twitter"></i></a>
                        <a class="platform" href="http://behance.com" target="_blank"><i
                                class="fab fa-behance"></i></a>
                        <a class="platform" href="http://youtube.com" target="_blank"><i
                                class="fab fa-youtube"></i></a>
                        <a class="platform" href="http://linkedin.com" target="_blank"><i
                                class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- successfully add in wishlist -->
<div class="successfully-addedin-wishlist">
    <div class="d-flex" style="align-items: center; gap: 15px;">
        <i class="fa-regular fa-check"></i>
        <p>Your item has already added in wishlist successfully</p>
    </div>
</div>
<!-- successfully add in wishlist end -->



<!-- Modal -->
<div class="modal modal-compare-area-start fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Products Compare</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="compare-main-wrapper-body">
                    <div class="single-compare-elements name">Preview</div>
                    <div class="single-compare-elements">
                        <div class="thumbnail-preview">
                            <img src="assets/images/grocery/01.jpg" alt="grocery">
                        </div>
                    </div>
                    <div class="single-compare-elements">
                        <div class="thumbnail-preview">
                            <img src="assets/images/grocery/02.jpg" alt="grocery">
                        </div>
                    </div>
                    <div class="single-compare-elements">
                        <div class="thumbnail-preview">
                            <img src="assets/images/grocery/03.jpg" alt="grocery">
                        </div>
                    </div>
                </div>
                <div class="compare-main-wrapper-body productname spacifiq">
                    <div class="single-compare-elements name">Name</div>
                    <div class="single-compare-elements">
                        <p>J.Crew Mercantile Women's Short</p>
                    </div>
                    <div class="single-compare-elements">
                        <p>Amazon Essentials Women's Tanks</p>
                    </div>
                    <div class="single-compare-elements">
                        <p>Amazon Brand - Daily Ritual Wom</p>
                    </div>
                </div>
                <div class="compare-main-wrapper-body productname">
                    <div class="single-compare-elements name">Price</div>
                    <div class="single-compare-elements price">
                        <p>$25.00</p>
                    </div>
                    <div class="single-compare-elements price">
                        <p>$39.25</p>
                    </div>
                    <div class="single-compare-elements price">
                        <p>$12.00</p>
                    </div>
                </div>
                <div class="compare-main-wrapper-body productname">
                    <div class="single-compare-elements name">Description</div>
                    <div class="single-compare-elements discription">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                    </div>
                    <div class="single-compare-elements discription">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                    </div>
                    <div class="single-compare-elements discription">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                    </div>
                </div>
                <div class="compare-main-wrapper-body productname">
                    <div class="single-compare-elements name">Rating</div>
                    <div class="single-compare-elements">
                        <div class="rating">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <span>(25)</span>
                        </div>
                    </div>
                    <div class="single-compare-elements">
                        <div class="rating">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <span>(19)</span>
                        </div>
                    </div>
                    <div class="single-compare-elements">
                        <div class="rating">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <span>(120)</span>
                        </div>
                    </div>
                </div>
                <div class="compare-main-wrapper-body productname">
                    <div class="single-compare-elements name">Weight</div>
                    <div class="single-compare-elements">
                        <div class="rating">
                            <p>320 gram</p>
                        </div>
                    </div>
                    <div class="single-compare-elements">
                        <p>370 gram</p>
                    </div>
                    <div class="single-compare-elements">
                        <p>380 gram</p>
                    </div>
                </div>
                <div class="compare-main-wrapper-body productname">
                    <div class="single-compare-elements name">Stock status</div>
                    <div class="single-compare-elements">
                        <div class="instocks">
                            <span>In Stock</span>
                        </div>
                    </div>
                    <div class="single-compare-elements">
                        <div class="outstocks">
                            <span class="out-stock">Out Of Stock</span>
                        </div>
                    </div>
                    <div class="single-compare-elements">
                        <div class="instocks">
                            <span>In Stock</span>
                        </div>
                    </div>
                </div>
                <div class="compare-main-wrapper-body productname">
                    <div class="single-compare-elements name">Buy Now</div>
                    <div class="single-compare-elements">
                        <div class="cart-counter-action">
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
                    <div class="single-compare-elements">
                        <div class="cart-counter-action">
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
                    <div class="single-compare-elements">
                        <div class="cart-counter-action">
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
        </div>
    </div>
</div>


<!--================= Preloader Section Start Here =================-->
<div id="weiboo-load">
    <div class="preloader-new">
        <svg class="cart_preloader" role="img" aria-label="Shopping cart_preloader line animation"
             viewBox="0 0 128 128" width="128px" height="128px" xmlns="http://www.w3.org/2000/svg">
            <g fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="8">
                <g class="cart__track" stroke="hsla(0,10%,10%,0.1)">
                    <polyline points="4,4 21,4 26,22 124,22 112,64 35,64 39,80 106,80" />
                    <circle cx="43" cy="111" r="13" />
                    <circle cx="102" cy="111" r="13" />
                </g>
                <g class="cart__lines" stroke="currentColor">
                    <polyline class="cart__top" points="4,4 21,4 26,22 124,22 112,64 35,64 39,80 106,80"
                              stroke-dasharray="338 338" stroke-dashoffset="-338" />
                    <g class="cart__wheel1" transform="rotate(-90,43,111)">
                        <circle class="cart__wheel-stroke" cx="43" cy="111" r="13" stroke-dasharray="81.68 81.68"
                                stroke-dashoffset="81.68" />
                    </g>
                    <g class="cart__wheel2" transform="rotate(90,102,111)">
                        <circle class="cart__wheel-stroke" cx="102" cy="111" r="13" stroke-dasharray="81.68 81.68"
                                stroke-dashoffset="81.68" />
                    </g>
                </g>
            </g>
        </svg>
    </div>
</div>
<!--================= Preloader End Here =================-->








<div class="search-input-area">
    <div class="container">
        <div class="search-input-inner">
            <div class="input-div">
                <input id="searchInput1" class="search-input" type="text" placeholder="Search by keyword or #">
                <button><i class="far fa-search"></i></button>
            </div>
        </div>
    </div>
    <div id="close" class="search-close-icon"><i class="far fa-times"></i></div>
</div>
<div id="anywhere-home" class="anywere"></div>
<!-- progress area start -->
<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"></path>
    </svg>
</div>
<!-- progress area end -->


<!-- plugins js -->
<script defer src="{{ asset('frontend/assets/js/plugins.js') }}"></script>

<!-- custom js -->
<script defer src="{{ asset('frontend/assets/js/main.js') }}"></script>
<!-- header style two End -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
        case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

        case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

        case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

        case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
    }
    @endif
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    console.log('csrf token:', $('meta[name="csrf-token"]').attr('content'))
    //Get product
    function productView(id)
    {
        // alert(id)
        $.ajax({
            type: 'GET',
            url: 'shop/product/modal/view/'+id,
            dataType: 'json',
            success: function (data)
            {
                console.log(data)
                $('#pname').text(data.product.name);
                $('#pprice').text('$'+data.product.price);
                $('#pdesc').text(data.product.short_desc);
                $('#pcode').text(data.product.product_code);
                $('#ptags').text(data.product.tags);
                $('#product_category').text(data.product.product_category.name);
                $('#psubcategory').text(data.product.product_subcategory.name);
                console.log('pcategory:', data.product.product_category.name)
                $('#pbrand').text(data.product.brand.name);
                $('#pimage').attr('src', '/'+data.product.product_thumbnail);
                $('#pimage2').attr('src', '/'+data.product.product_thumbnail);

                $('#product_id').val(id)
                $('#qty').val(1)

                //product price
                if(data.product.discount == null)
                {
                    $('#pprice').text('');
                    $('#oldPrice').text('');
                    $('#pprice').text('$'+data.product.price);
                } else
                {
                    $('#oldPrice').text('$'+data.product.price);
                    $('#pprice').text('$'+data.product.discount);
                }

                // In stock
                if (data.product.qty > 0)
                {
                    $('#available').text('');
                    $('#stockout').text('');
                    $('#available').text('In Stock');
                } else
                {
                    $('#available').text('');
                    $('#stockout').text('Out of Stock');
                }

                //size

                console.log($('select[name="product_size"]')); // Should log the select element for sizes
                console.log($('select[name="pcolor"]')); // Should log the select element for colors

                console.log('Size data:', data.size);
                // Size options
                var sizeSelect = $('select[name="product_size"]');
                sizeSelect.empty(); // Clear existing options
                if (data.size && data.size.length > 0) {
                    $.each(data.size, function (key, value) {
                        sizeSelect.append('<option value="' + value + '">' + value + '</option>');
                    });
                    $('#sizeArea').show();
                } else {
                    $('#sizeArea').hide();
                }

                // Color options
                var colorSelect = $('select[name="pcolor"]');
                colorSelect.empty(); // Clear existing options
                if (data.color && data.color.length > 0) {
                    $.each(data.color, function (key, value) {
                        colorSelect.append('<option value="' + value + '">' + value + '</option>');
                    });
                    $('#colorArea').show();
                } else {
                    $('#colorArea').hide();
                }

                // Reinitialize niceSelect to update the UI
                sizeSelect.niceSelect('update');
                colorSelect.niceSelect('update');

                var multiImage = '';
                var baseMultiImage = '';
                // Populate product_multi_image
                $.each(data.product.product_multi_image, function (index, value) {
                    // var thumbWrapper = $('.thumb-wrapper').eq(index);
                    // thumbWrapper.removeClass('hide');
                    // thumbWrapper.find('img').attr('src', '/' + value.name);
                    // thumbWrapper.find('.product-thumb').css('background-image', 'url(/' + value.name + ')');
                    multiImage += `<div class="thumb-wrapper two${index} filterd-items hide">
                        <div class="product-thumb zoom" onmousemove="zoom(event)"
                             style="background-image: url(${value.name})"><img
                                src="${value.name}" alt="product-thumb">
                        </div>
                    </div>`;
                    baseMultiImage += `<div class="thumb-filter filter-btn" data-show=".two${index}"><img
                                src="${value.name}" alt="product-thumb-filter">
                        </div>`;
                });
                $('#imageArea').append(multiImage);
                $('#baseImageArea').append(baseMultiImage);



                // $.each(data.product.multi_image, function (key, value){
                //     document.getElementById('slider').insertAdjacentHTML('afterbegin', '<figure class="border-radius-10"><img src="' + value.name + '" alt="product image" /></figure>');
                //     // document.getElementById('slider').innerHTML = '<figure class="border-radius-10"><img src="' + imageUrl + '" alt="product image" /></figure>';
                //
                //     document.getElementById('t-image').innerHTML = '<div><img src="' + value.name + '" alt="product image" /></div>';
                //
                //     // $('#slider').append('<figure class="border-radius-10"> <img src="'+value.name+'" alt="product image" /> </figure>')
                //     // $('#t-image').append('<div><img src="'+value.name+'" alt="product image" /></div>')
                // })
                // $.each(data.product.multi_image, function (key, value){
                //     // Append to #slider
                //     document.getElementById('slider').insertAdjacentHTML('afterbegin', '<figure class="border-radius-10"><img src="' + value.name + '" alt="product image" /></figure>');
                //
                //     // Accumulate HTML content for #t-image
                //     var tImageContent = '<div><img src="' + value.name + '" alt="product image" /></div>';
                //     // Append additional images
                //     document.getElementById('t-image').insertAdjacentHTML('beforeend', tImageContent);
                // });
            }
        })
    } //end product view

    //start add to cart
    function addToCart(){
        let product_name = $('#pname').text();
        let id = $('#product_id').val();
        let color = $('#color option:selected').text();
        let size = $('#product_size option:selected').text();
        let qty = $('#qty').val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            dataType: 'json',
            data: {
                color: color,
                size: size,
                qty: qty,
                product_name: product_name,
            },
            url: "/cart/data/store/"+id,
            success:function (data){
                miniCart();
                $('#closeModal').click();

                //message
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 3000

                })
                if ($.isEmptyObject(data.error))
                {
                    Toast.fire({
                        icon: "success",
                        title: data.success,
                    });
                } else
                {
                    Toast.fire({
                        icon: "error",
                        title: data.error,
                    });
                }
                console.log(data)
            }
        })
    }
    //End add to cart

    //start details add to cart
    function addToCartDetails(){
        let product_name = $('#dpname').text();
        let id = $('#dproduct_id').val();
        let color = $('#dcolor option:selected').text();
        let size = $('#dsize option:selected').text();
        let qty = $('#dqty').val();
        $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',
            data: {
                color: color,
                size: size,
                qty: qty,
                product_name: product_name,
            },
            url: "/store/details/cart/data/store/"+id,
            success:function (data){
                miniCart();
                // $('#closeModal').click();

                //message
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 3000

                })
                if ($.isEmptyObject(data.error))
                {
                    Toast.fire({
                        icon: "success",
                        title: data.success,
                    });
                } else
                {
                    Toast.fire({
                        icon: "error",
                        title: data.error,
                    });
                }
                console.log(data)
            }
        })
    }
    //End details add to cart
</script>

<script>
    function miniCart(){
        $.ajax({
            type: 'GET',
            url: '/product/mini/cart',
            dataType: 'json',
            success: function (response){
                $('#cartQty').text(response.cartQty);
                $('span[id="cartSubTotal"]').text('$'+response.cartTotal)
                let miniCart = `<h5 class="shopping-cart-number">Shopping Cart (${response.cartQty})</h5>`;
                $.each(response.cart, function (key, value){
                    miniCart += `<div class="cart-item-1 border-top">
                                        <div class="img-name">
                                            <div class="thumbanil">
                                                <img src="/${value.options.image}" alt="">
                                            </div>
                                            <div class="details">
                                                <a href="shop-details.html">
                                                    <h5 class="title">${value.name}</h5>
                                                </a>
                                                <div class="number">
                                                    ${value.qty} <i class="fa-regular fa-x"></i>
                                                    <span>$${value.price}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="close-c1">
                                            <i class="fa-regular fa-x"></i>
                                        </div>
                                    </div>
`
                });
                miniCart += `<div class="sub-total-cart-balance">
                                            <div class="bottom-content-deals mt--10">
                                                <div class="top">
                                                    <span>Sub Total:</span>
                                                    <span class="number-c">$${response.cartTotal}</span>
                                                </div>
                                                <div class="single-progress-area-incard">
                                                    <div class="progress">
                                                        <div class="progress-bar wow fadeInLeft" role="progressbar" style="width: 80%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <p>Spend More <span>$125.00</span> to reach <span>Free Shipping</span></p>
                                            </div>
                                            <div class="button-wrapper d-flex align-items-center justify-content-between">
                                                <a href="/my-cart" class="rts-btn btn-primary ">View Cart</a>
                                                <a href="checkout.html" class="rts-btn btn-primary border-only">CheckOut</a>
                                            </div>
                                        </div>`
                $('#miniCart').html(miniCart);
                console.log(response)
            }
        })
    }
    miniCart();

    function miniCart2(){
        $.ajax({
            type: 'GET',
            url: '/product/mini/cart',
            dataType: 'json',
            success: function (response2){
                $('#cartQty2').text(response2.cartQty);
                $('span[id="cartSubTotal"]').text('$'+response2.cartTotal)
                let miniCart2 = `<h5 class="shopping-cart-number">Shopping Cart (${response2.cartQty})</h5>`;
                $.each(response2.cart, function (key, value){
                    miniCart2 += `<div class="cart-item-1 border-top">
                                        <div class="img-name">
                                            <div class="thumbanil">
                                                <img src="/${value.options.image}" alt="">
                                            </div>
                                            <div class="details">
                                                <a href="shop-details.html">
                                                    <h5 class="title">${value.name}</h5>
                                                </a>
                                                <div class="number">
                                                    ${value.qty} <i class="fa-regular fa-x"></i>
                                                    <span>$${value.price}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="close-c1">
                                            <i class="fa-regular fa-x"></i>
                                        </div>
                                    </div>
`
                });
                miniCart2 += `<div class="sub-total-cart-balance">
                                            <div class="bottom-content-deals mt--10">
                                                <div class="top">
                                                    <span>Sub Total:</span>
                                                    <span class="number-c">$${response2.cartTotal}</span>
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
                                        </div>`
                $('#miniCart2').html(miniCart2);
                console.log(response)
            }
        })
    }
    miniCart2();

    // Mini cart remove item
    function miniCartRemove(rowId){
        $.ajax({
            type: 'GET',
            url: '/product/mini/cart/remove/'+rowId,
            dataType: 'json',
            success: function (data) {
                miniCart();
                //message
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 3000

                })
                if ($.isEmptyObject(data.error))
                {
                    Toast.fire({
                        icon: "success",
                        title: data.success,
                    });
                } else
                {
                    Toast.fire({
                        icon: "error",
                        title: data.error,
                    });
                }
            }
        })
    }
</script>

<script>
    //Start wish list
    function addToWishList(product_id){
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '/add-to-wish-list/'+product_id,
            success: function (data) {
                //message
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 5000

                })
                if ($.isEmptyObject(data.error))
                {
                    Toast.fire({
                        icon: "success",
                        title: data.success,
                    });
                } else
                {
                    Toast.fire({
                        icon: "error",
                        title: data.error,
                    });
                }
            }
        })
    }
    //End wish list

    //Start load wish list
    function wishlist(){
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '/user/get-wishlist-product',
            success: function (response) {
                $('#wishlistQty').text(response.wishlistQty)
                let rows = '';
                $.each(response.wishlist, function (key, value){
                    rows += `<tr>
                            <td class="custome-checkbox pl-30">
                    </td>
                    <td class="image product-thumbnail"><img src="/${value.product.thumbnail}" alt="#" /></td>
                    <td class="product-des product-name">
                        <h6><a class="product-name mb-10" href="shop-product-right.html">${value.product.name}</a></h6>
                        <div class="product-rate-cover">
                            <div class="product-rate d-inline-block">
                                <div class="product-rating" style="width: 90%"></div>
                            </div>
                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                        </div>
                    </td>
                    <td class="price" data-title="Price">
                        <h3 class="text-brand">$${value.product.discount == null ? value.product.price : value.product.discount}</h3>
                    </td>
                    <td class="text-center detail-info" data-title="Stock">
                        ${value.product.quantity > 0
                        ? `<span class="stock-status in-stock mb-0"> In Stock </span>`
                        : '<span class="stock-status out-stock mb-0"> Out Of Stock </span>'
                    }
                    </td>
                    <td class="action text-center" data-title="Remove">
                        <a type="submit" class="text-body" id="${value.id}" onclick="wishlistRemove(this.id)"><i class="fi-rs-trash"></i></a>
                    </td>
                </tr>`
                });
                $('#wishlist').html(rows)

            }
        })
    }
    wishlist();
    //End load wish list

    //Start Remove Item from wishlist
    function wishlistRemove(id){
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '/user/remove-from-wish-list/'+id,
            success: function (data) {
                wishlist();
                //message
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 5000

                })
                if ($.isEmptyObject(data.error))
                {
                    Toast.fire({
                        icon: "success",
                        title: data.success,
                    });
                } else
                {
                    Toast.fire({
                        icon: "error",
                        title: data.error,
                    });
                }
            }
        })
    }
    //End Remove Item from wishlist
</script>

{{--Compare start--}}

<script>
    function addToCompare(product_id){
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '/user/add-to-compare/'+product_id,
            success: function (data) {
                //message
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 5000

                })
                if ($.isEmptyObject(data.error))
                {
                    Toast.fire({
                        icon: "success",
                        title: data.success,
                    });
                } else
                {
                    Toast.fire({
                        icon: "error",
                        title: data.error,
                    });
                }
            }
        })
    }
</script>

{{--Load compare data--}}
<script>
    //Start load compare
    function compare(){
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '/user/get-compare-product',
            success: function (response) {
                $('#compareQty').text(response.compareQty)
                let rows = '';
                $.each(response.compare, function (key, value){
                    rows += `<tr class="pr_image">
                            <td class="text-muted font-sm fw-600 font-heading mw-200">Preview</td>
                            <td class="row_img"><img src="/${value.product.thumbnail}" alt="compare-img" style="height: 300px; width: 300px" /></td>
                        </tr>
                        <tr class="pr_title">
                            <td class="text-muted font-sm fw-600 font-heading">Name</td>
                            <td class="product_name">
                                <h6><a href="shop-product-full.html" class="text-heading">${value.product.name}</a></h6>
                            </td>
                        </tr>
                        <tr class="pr_price">
                            <td class="text-muted font-sm fw-600 font-heading">Price</td>
                            <td class="product_price">
                                <h4 class="price text-brand">$${value.product.discount == null ? value.product.price : value.product.discount}</h4>
                            </td>
                        </tr>
                    <tr class="description">
                        <td class="text-muted font-sm fw-600 font-heading">Description</td>
                        <td class="row_text font-xs">
                            <p class="font-sm text-muted">${value.product.description}</p>
                        </td>
                    </tr>
                    <tr class="pr_stock">
                        <td class="text-muted font-sm fw-600 font-heading">Stock status</td>
                        <td class="row_stock">${value.product.quantity > 0
                        ? `<span class="stock-status in-stock mb-0"> In Stock </span>`
                        : '<span class="stock-status out-stock mb-0"> Out Of Stock </span>'
                    }</td>
                    </tr>
                    <tr class="pr_remove text-muted">
                        <td class="text-muted font-md fw-600"></td>
                        <td class="row_remove">
                            <a type="submit" class="text-muted" id="${value.id}" onclick="compareRemove(this.id)"><i class="fi-rs-trash mr-5"></i><span>Remove</span> </a>
                        </td>
                    </tr>`
                });
                $('#compare').html(rows)

            }
        })
    }
    compare();
    //End load compare

    //Start Remove Item from compare
    function compareRemove(id){
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '/user/remove-from-compare/'+id,
            success: function (data) {
                compare();
                //message
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 5000

                })
                if ($.isEmptyObject(data.error))
                {
                    Toast.fire({
                        icon: "success",
                        title: data.success,
                    });
                } else
                {
                    Toast.fire({
                        icon: "error",
                        title: data.error,
                    });
                }
            }
        })
    }
    //End Remove Item from compare
</script>
{{-- end Load compare data--}}

{{--My cart--}}
<script>
    function cart(){
        $.ajax({
            type: 'GET',
            url: '/get-cart-product',
            dataType: 'json',
            success: function (response){
                $('#cartPageQty').text(response.cartQty);
                $('#cartPageSubTotal').text('$'+response.cartSubtotal)
                $('#cartPageTotal').text('$'+response.cartTotal)
                let rows = '';
                let items = '';
                console.log('cart page:', response)
                $.each(response.cart, function (key, value){
                    items += `<div class="single-cart-area-list main  item-parent">
                                <div class="product-main-cart">
                                    <div class="close section-activation" id="${value.rowId}" onclick="cartRemove(this.id)">
                                        <i class="fa-regular fa-x"></i>
                                    </div>
                                    <div class="thumbnail">
                                        <img src="/${value.options.image}" alt="shop">
                                    </div>
                                    <div class="information">
                                        <h6 class="title">${value.name}</h6>

                                    </div>
                                </div>
                                <div class="price">
                                    <p>$${value.price}</p>
                                </div>
                                <div class="quantity">
                                    <div class="quantity-edit">
                                        <input type="text" class="input" value="${value.qty}">
                                        <div class="button-wrapper-action">
                                            <button class="button"><i class="fa-regular fa-chevron-down" id="${value.rowId}" onclick="cartDecrement(this.id)"></i></button>
                                            <button class="button plus" id="${value.rowId}" onclick="cartIncrement(this.id)">+<i class="fa-regular fa-chevron-up"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="subtotal">
                                    <p>$${value.subtotal}</p>
                                </div>
                            </div>`



                    rows += `<tr class="pt-30">
                            <td class="custome-checkbox pl-30">
                    </td>
                    <td class="image product-thumbnail pt-40"><img src="/${value.options.image}" alt="#"></td>
                    <td class="product-des product-name">
                        <h6 class="mb-5"><a class="product-name mb-10 text-heading" href="shop-product-right.html">${value.name}</a></h6>
                        <div class="product-rate-cover">
                            <div class="product-rate d-inline-block">
                                <div class="product-rating" style="width:90%">
                                </div>
                            </div>
                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                        </div>
                    </td>
                    <td class="price" data-title="Price">
                        <h4 class="text-body">$${value.price} </h4>
                    </td>
                    <td class="price" data-title="Price">
                        <h4 class="text-body">${value.options.color == null ? '...' : value.options.color} </h4>
                    </td>
                    <td class="price" data-title="Price">
                        <h4 class="text-body">${value.options.size == null ? '...' : value.options.size} </h4>
                    </td>
                    <td class="text-center detail-info" data-title="Stock">
                        <div class="detail-extralink mr-15">
                            <div class="detail-qty border radius">
                                <a type="submit" class="qty-down"><i class="fi-rs-angle-small-down" id="${value.rowId}" onclick="cartDecrement(this.id)"></i></a>
                                <input type="text" name="quantity" class="qty-val" value="${value.qty}" min="1">
                                <a type="submit" class="qty-up"><i class="fi-rs-angle-small-up" id="${value.rowId}" onclick="cartIncrement(this.id)"></i></a>
                            </div>
                        </div>
                    </td>
                    <td class="price" data-title="Price">
                        <h4 class="text-brand">$${value.subtotal} </h4>
                    </td>
                    <td class="action text-center" data-title="Remove"><a type="submit" class="text-body" id="${value.rowId}" onclick="cartRemove(this.id)"><i class="fi-rs-trash"></i></a></td>
                </tr>`
                });
                $('#cartPage').html(rows);
                $('#cartPageProduct').html(items);
                console.log(response)
            }
        })
    }
    cart();

    // cart remove item
    function cartRemove(rowId){
        $.ajax({
            type: 'GET',
            url: '/product-cart-remove/'+rowId,
            dataType: 'json',
            success: function (data) {
                miniCart();
                miniCart2();
                cart();
                //message
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 3000

                })
                if ($.isEmptyObject(data.error))
                {
                    Toast.fire({
                        icon: "success",
                        title: data.success,
                    });
                } else
                {
                    Toast.fire({
                        icon: "error",
                        title: data.error,
                    });
                }
            }
        })
    }

    // cart Item quantity decrement
    function cartDecrement(rowId)
    {
        $.ajax({
            type: 'GET',
            url: '/cart-item-quantity-decrement/'+rowId,
            dataType: 'json',
            success:function (data) {
                console.log(data)
                cart();
                miniCart();
                miniCart2();

            }
        })
    }
    // end cart Item quantity decrement

    // cart Item quantity increment
    function cartIncrement(rowId)
    {
        $.ajax({
            type: 'GET',
            url: '/cart-item-quantity-increment/'+rowId,
            dataType: 'json',
            success:function (data) {
                console.log(data)
                cart();
                miniCart();
                miniCart2();

            }
        })
    }
    // end cart Item quantity increment
</script>
{{--End my cart--}}

</body>
</html>
