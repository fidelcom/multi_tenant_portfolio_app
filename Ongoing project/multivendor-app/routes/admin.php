<?php

use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\AdminProfileController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\UserManagementController;
use App\Http\Controllers\admin\UserStatusManagementController;
use App\Http\Controllers\admin\VendorManagementController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\ProductCategoryController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\ProductMultiImageController;
use App\Http\Controllers\backend\ProductSubcategoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('auth')->group(function (){

    //Dashboard Route
    Route::controller(AdminDashboardController::class)->group(function (){
        Route::get('/dashboard', 'index')->name('admin.dashboard');
//        Route::get('/create', 'create')->name('profile.create');
//        Route::post('/store', 'store')->name('profile.store');
//        Route::get('/profile/{profile}/edit', 'edit')->name('profile.edit');
//        Route::get('/profile/{profile}/show', 'show')->name('profile.show');
//        Route::put('/{profile}', 'update')->name('profile.update');
//        Route::delete('/{profile}', 'destroy')->name('profile.destroy');
    });

    //Profile Route
    Route::prefix('/profile')->controller(AdminProfileController::class)->group(function (){
        Route::get('/', 'index')->name('admin.profile.home');
//        Route::get('/create', 'create')->name('admin.profile.create');
        Route::post('/store', 'store')->name('admin.profile.store');
//        Route::get('/profile/{profile}/edit', 'edit')->name('admin.profile.edit');
//        Route::get('/profile/{profile}/show', 'show')->name('admin.profile.show');
        Route::put('/{user}', 'update')->name('admin.profile.update');
        Route::delete('/{profile}', 'destroy')->name('admin.profile.destroy');
        Route::post('/change-password', 'changePassword')->name('admin.change.password');
    });

    //Banner Route
    Route::prefix('/banner')->controller(BannerController::class)->group(function (){
        Route::get('/', 'index')->name('banner.home');
        Route::get('/create', 'create')->name('banner.create');
        Route::post('/store', 'store')->name('banner.store');
        Route::get('/banners/{banner}/edit', 'edit')->name('banner.edit');
        Route::put('/{banner}', 'update')->name('banner.update');
        Route::delete('/{banner}', 'destroy')->name('banner.destroy');
    });

    //Slider Route
    Route::prefix('/sliders')->controller(SliderController::class)->group(function (){
        Route::get('/', 'index')->name('slider.home');
        Route::get('/create', 'create')->name('slider.create');
        Route::post('/store', 'store')->name('slider.store');
        Route::get('/sliders/{slider}/edit', 'edit')->name('slider.edit');
        Route::put('/{slider}', 'update')->name('slider.update');
        Route::delete('/{slider}', 'destroy')->name('slider.destroy');
    });

    //Product Category Route
    Route::prefix('/product/categories')->controller(ProductCategoryController::class)->group(function (){
        Route::get('/', 'index')->name('product.categories.home');
        Route::get('/create', 'create')->name('product.categories.create');
        Route::post('/store', 'store')->name('product.categories.store');
        Route::get('/product-categories/{category}/edit', 'edit')->name('product.categories.edit');
        Route::put('/{category}', 'update')->name('product.categories.update');
        Route::delete('/{category}', 'destroy')->name('product.categories.destroy');
    });

    //Product SubCategory Route
    Route::prefix('/product/subcategories')->controller(ProductSubcategoryController::class)->group(function (){
        Route::get('/', 'index')->name('product.subcategories.home');
        Route::get('/create', 'create')->name('product.subcategories.create');
        Route::post('/store', 'store')->name('product.subcategories.store');
        Route::get('/product-subcategories/{subcategory}/edit', 'edit')->name('product.subcategories.edit');
        Route::put('/{subcategory}', 'update')->name('product.subcategories.update');
        Route::delete('/{subcategory}', 'destroy')->name('product.subcategories.destroy');
        Route::get('/get-subcategories/{categoryId}', 'getSubcategories');
    });

    //Brand Route
    Route::prefix('/brands')->controller(BrandController::class)->group(function (){
        Route::get('/', 'index')->name('brand.home');
        Route::get('/create', 'create')->name('brand.create');
        Route::post('/store', 'store')->name('brand.store');
        Route::get('/brand/{brand}/edit', 'edit')->name('brand.edit');
        Route::put('/{brand}', 'update')->name('brand.update');
        Route::delete('/{brand}', 'destroy')->name('brand.destroy');
    });

    //Product Route
    Route::prefix('/product')->controller(ProductController::class)->group(function (){
        Route::get('/', 'index')->name('product.home');
        Route::get('/create', 'create')->name('product.create');
        Route::post('/store', 'store')->name('product.store');
        Route::get('/product/{product}/edit', 'edit')->name('product.edit');
        Route::get('/product/{product}/show', 'show')->name('product.show');
        Route::put('/{product}', 'update')->name('product.update');
        Route::delete('/{product}', 'destroy')->name('product.destroy');
    });
    Route::post('/multi/image/{productId}', [ProductMultiImageController::class, 'store'])->name('product.image');
    Route::get('/multi_image/{id}', [ProductMultiImageController::class, 'destroy'])->name('product.image.delete');

    //User Management Route
    Route::prefix('/user/management')->controller(UserManagementController::class)->group(function (){
        Route::get('/', 'index')->name('admin.all.user');
        Route::get('/create', 'create')->name('admin.user.create');
        Route::post('/store', 'store')->name('admin.user.store');
        Route::get('/users/{user}/show', 'show')->name('admin.user.show');
        Route::get('/users/{user}/edit', 'edit')->name('admin.user.edit');
        Route::put('/{user}', 'update')->name('admin.user.update');
        Route::delete('/{user}', 'destroy')->name('admin.user.destroy');
    });

    //User Management Route
    Route::prefix('/vendor/management')->controller(VendorManagementController::class)->group(function (){
        Route::get('/', 'index')->name('admin.all.vendor');
        Route::get('/create', 'create')->name('admin.vendor.create');
        Route::post('/store', 'store')->name('admin.vendor.store');
        Route::get('/users/{user}/show', 'show')->name('admin.vendor.show');
        Route::get('/users/{user}/edit', 'edit')->name('admin.vendor.edit');
        Route::put('/{user}', 'update')->name('admin.vendor.update');
        Route::delete('/{user}', 'destroy')->name('admin.vendor.destroy');
    });

    Route::prefix('/user/management')->controller(UserStatusManagementController::class)->group(function (){
        Route::get('/user/{user}/suspend', 'suspendUser')->name('admin.suspend.user');
        Route::get('/user/{user}/activate', 'activateUser')->name('admin.activate.user');
    });
});
