<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\BlogCategoryController;
use App\Http\Controllers\Home\BlogController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    // Route::get('/', function () {
    //     return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
    // })->name('tenant.login');

    Route::get('/', function () {
        return view('frontend.index');
    })->name('home.index');

    Route::controller(HomeController::class)->group(function (){
        Route::get('about', 'homeAbout')->name('home.about');
        Route::get('blog/details/{id}', 'blogDetail')->name('blog.details');
        Route::get('category/post/{id}', 'categoryPost')->name('category.post');
        Route::get('/blog', 'homeBlog')->name('home.blog');
    });

    Route::get('/dashboard', function () {
        return view('admin/index');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    Route::controller(AdminController::class)->group(function (){
        Route::get('/admin/logout', 'destroy')->name('admin.logout');
        Route::get('/admin/profile', 'profile')->name('admin.profile');
        Route::get('/admin/edit/profile', 'editProfile')->name('edit.profile');
        Route::post('/admin/store/profile', 'storeProfile')->name('store.profile');
        Route::get('/admin/change/password', 'changePassword')->name('change.password');
        Route::post('/admin/update/password', 'updatePassword')->name('update.password');

    });

    //Home Slide
    Route::controller(HomeSliderController::class)->prefix('/admin')->group(function (){
        Route::get('home/slide', 'homeSlider')->name('home.slide');
        Route::post('update/slide', 'updateSlider')->name('update.slider');
    });

    //About Slide
    Route::controller(AboutController::class)->prefix('/admin')->group(function (){
        Route::get('about/page', 'aboutPage')->name('about.page');
        Route::get('about/multi/image', 'aboutMultiImage')->name('about.multi.image');
        Route::post('update/about', 'updateAbout')->name('update.about');
        Route::post('store/multi/image', 'storeMultiImage')->name('store.multi.image');
        Route::get('all/multi/image', 'allMultiImage')->name('all.multi.image');
        Route::get('edit/multi/image/{id}', 'editMultiImage')->name('edit.multi.image');
        Route::post('update/multi/image/{id}', 'updateMultiImage')->name('update.multi.image');
        Route::get('delete/multi/image/{id}', 'deleteMultiImage')->name('delete.multi.image');
    });

    //Blog Category
    Route::controller(BlogCategoryController::class)->prefix('/admin')->group(function (){
        Route::get('/all/blog/category', 'allBlogCategory')->name('all.blog.category');
        Route::get('/add/blog/category', 'addBlogCategory')->name('add.blog.category');
        Route::post('/store/blog/category', 'storeBlogCategory')->name('store.blog.category');
        Route::get('/edit/blog/category/{id}', 'editBlogCategory')->name('edit.blog.category');
        Route::post('/update/blog/category/{id}', 'updateBlogCategory')->name('update.blog.category');
        Route::get('/delete/blog/category/{id}', 'deleteBlogCategory')->name('delete.blog.category');
    });

    //Blog All Route
    Route::get('/admin/blog/del/{id}', [BlogController::class, 'del'])->name('blog.del');
    Route::resource('/admin/blog', BlogController::class);

    require __DIR__.'/auth.php';

});
