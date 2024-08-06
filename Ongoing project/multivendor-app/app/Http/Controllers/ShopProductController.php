<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSubcategory;
use Illuminate\Http\Request;

class ShopProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(30);
        return view('frontend.product.shop', compact('products'));
    }

    public function show(Product $product)
    {
        $relatedProduct = Product::where('id', '!=', $product->id)->where(['product_category_id' => $product->product_category->id, 'product_subcategory_id' => $product->product_subcategory->id])->orderBy('id', 'DESC')->limit(12)->get();
        return view('frontend.product.product_details', compact('product', 'relatedProduct'));
    }

    public function modalProduct($id)
    {
        $product = Product::with('product_category', 'brand', 'product_subcategory', 'product_multiImage')->findOrFail($id);
        return response()->json(array(
            'product' => $product,
            'size' => explode(',',$product->size),
            'color' => explode(',',$product->color),
            ), 200);
    }

    public function categoryProduct(ProductCategory $category)
    {
        $products = Product::where('product_category_id', $category->id)->latest()->paginate(30);
        return view('frontend.product.shop_category_product', compact('products', 'category'));
    }

    public function subcategoryProduct(ProductSubcategory $subcategory)
    {
        $products = Product::where('product_subcategory_id', $subcategory->id)->latest()->paginate(30);
        return view('frontend.product.shop_subcategory_product', compact('products', 'subcategory'));
    }

    public function brandProduct(Brand $brand)
    {
        $products = Product::where('brand_id', $brand->id)->latest()->paginate(30);
        return view('frontend.product.brand_product', compact('brand', 'products'));
    }
}
