<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopProductController;
use App\Http\Controllers\ShopVendorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::fallback(function () {
    // ...
});

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [IndexController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Shop product routes
Route::prefix('/shop')->controller(ShopProductController::class)->group(function (){
    Route::get('/', 'index')->name('shop.home');
    Route::get('/product/{product}/{slug}', 'show')->name('single.product');
    Route::get('/product_category/{category}/{slug}', 'categoryProduct')->name('category.product');
    Route::get('/product_subcategory/{subcategory}/{slug}', 'subcategoryProduct')->name('subcategory.product');
    Route::get('/brand/product/{brand}/{slug}', 'brandProduct')->name('brand.product');
    Route::get('/product/modal/view/{id}', 'modalProduct')->name('modal.product');
});

Route::controller(CartController::class)->group(function (){
    Route::get('/my-cart', 'index')->name('cart');
    Route::get('/mycart', 'myCart')->name('mycart');
    Route::get('/get-cart-product', 'getCartProduct')->name('get.cart.product');
    Route::get('/product-cart-remove/{rowId}', 'removeCartProduct')->name('remove.cart.product');
    Route::get('/cart-item-quantity-decrement/{rowId}', 'decrementCartProduct')->name('remove.cart.product');
    Route::get('/cart-item-quantity-increment/{rowId}', 'incrementCartProduct')->name('remove.cart.product');
    Route::post('/cart/data/store/{id}', 'addToCart');
    Route::post('/details/cart/data/store/{id}', 'addToCartDetails');
    Route::get('/product/mini/cart',  'miniCart');
    Route::get('/product/mini/cart/remove/{rowId}', 'removeMiniCart');
    Route::post('/coupon-apply', 'couponApply');
    Route::get('/coupon-calculation', 'couponCalculation');
    Route::get('/coupon-remove', 'couponRemove');
//    Route::get('/checkout', 'Checkout')->name('checkout');
});

Route::prefix('/vendors')->controller(ShopVendorController::class)->group(function (){
    Route::get('/', 'index')->name('shop.vendor.home');
    Route::get('/store/{user}/details', 'vendorStore')->name('shop.vendor.product');
});

Route::controller(CheckoutController::class)->group(function (){
    Route::get('/checkout', 'index')->name('checkout.home');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/vendor.php';
