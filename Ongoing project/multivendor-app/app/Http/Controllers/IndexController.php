<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSubcategory;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::all();
        $categories = ProductCategory::all();
        $category_products = ProductCategory::limit(4)->get();
        $bestSeller = Product::where(['best_seller' => 1, 'featured' => 1])->orderBy('created_at', 'DESC')->limit(4)->get();
        $special_offers = Product::where(['special_offer' => 1, 'featured' => 1])->orderBy('created_at', 'DESC')->limit(16)->get();
        $top_products = Product::where(['top_product' => 1, 'featured' => 1])->orderBy('created_at', 'DESC')->limit(4)->get();
        $new_products = Product::where(['new_product' => 1, 'featured' => 1])->orderBy('created_at', 'DESC')->limit(16)->get();
        $best_offers = Product::where(['best_offer' => 1, 'featured' => 1])->orderBy('created_at', 'DESC')->get();
        $recentlyAdded = Product::where(['featured' => 1])->orderBy('created_at', 'DESC')->limit(4)->get();
        return view('frontend.index', compact('categories', 'bestSeller', 'special_offers', 'top_products', 'new_products', 'best_offers', 'recentlyAdded', 'banners', 'category_products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
