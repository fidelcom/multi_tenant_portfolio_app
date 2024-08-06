<?php

use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\ProductCategoryController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\ProductMultiImageController;
use App\Http\Controllers\backend\ProductSubcategoryController;
use App\Http\Controllers\vendor\VendorDashboardController;
use App\Http\Controllers\vendor\VendorProductController;
use App\Http\Controllers\vendor\VendorProfileController;
use Illuminate\Support\Facades\Route;

Route::prefix('/vendor')->middleware('auth')->group(function (){

    //Dashboard Route
    Route::controller(VendorDashboardController::class)->group(function (){
        Route::get('/dashboard', 'index')->name('vendor.dashboard');
        Route::get('/create', 'create')->name('vendor.profile.create');
        Route::post('/store', 'store')->name('vendor.profile.store');
        Route::get('/profile/{profile}/edit', 'edit')->name('vendor.profile.edit');
        Route::get('/profile/{profile}/show', 'show')->name('vendor.profile.show');
        Route::put('/{profile}', 'update')->name('vendor.profile.update');
        Route::delete('/{profile}', 'destroy')->name('vendor.profile.destroy');
    });

    //Profile Route
    Route::prefix('/profile')->controller(VendorProfileController::class)->group(function (){
        Route::get('/', 'index')->name('vendor.profile.home');
//        Route::get('/create', 'create')->name('vendor.profile.create');
        Route::post('/store', 'store')->name('vendor.profile.store');
//        Route::get('/profile/{profile}/edit', 'edit')->name('vendor.profile.edit');
//        Route::get('/profile/{profile}/show', 'show')->name('vendor.profile.show');
        Route::put('/{user}', 'update')->name('vendor.profile.update');
        Route::delete('/{profile}', 'destroy')->name('vendor.profile.destroy');
        Route::post('/vendor/details', 'storeVendorDetails')->name('vendor.details');
        Route::post('/change-password', 'changePassword')->name('vendor.change.password');
    });

    //Product Route
    Route::prefix('/product')->controller(VendorProductController::class)->group(function (){
        Route::get('/', 'index')->name('vendor.product.home');
        Route::get('/create', 'create')->name('vendor.product.create');
        Route::post('/store', 'store')->name('vendor.product.store');
        Route::get('/product/{product}/edit', 'edit')->name('vendor.product.edit');
        Route::get('/product/{product}/show', 'show')->name('vendor.product.show');
        Route::put('/{product}', 'update')->name('vendor.product.update');
        Route::delete('/{product}', 'destroy')->name('vendor.product.destroy');
    });
    Route::post('/multi/image/{productId}', [ProductMultiImageController::class, 'store'])->name('product.image');
    Route::get('/multi_image/{id}', [ProductMultiImageController::class, 'destroy'])->name('product.image.delete');

});
