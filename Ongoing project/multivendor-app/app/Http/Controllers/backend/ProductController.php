<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductMultiImage;
use App\Models\ProductSubcategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('backend.product.all_product', compact('products'));
    }

    public function create()
    {
        $categories = ProductCategory::all();
        $subcategories = ProductSubcategory::all();
        $brands = Brand::all();
        $vendors = User::where('role', 'vendor')->orderBy('name', 'DESC')->get();
        return view('backend.product.create_product', compact('categories', 'subcategories', 'brands', 'vendors'));
    }

    public function store(Request $request)
    {
//        dd($request->all());
        $request->validate([
            'product_category_id' => 'required',
            'product_subcategory_id' => 'required',
            'brand_id' => 'required',
            'name' => 'required',
            'short_desc' => 'required',
            'long_desc' => 'required',
            'specification' => 'required',
            'price' => 'required',
            'qty' => 'required',
            'product_code' => 'required',
            'product_thumbnail' => 'required',
        ]);

        $img = $request->file('product_thumbnail');
        $filename = Str::uuid().'.'.$img->getClientOriginalExtension();
        $manager = new ImageManager(Driver::class);
        $manager->read($img)->scale(height: 550)->toPng()->save('uploads/product/'.$filename);
        $filename = 'uploads/product/'.$filename;

        $product = Product::create([
            'product_category_id' => $request->product_category_id,
            'product_subcategory_id' => $request->product_subcategory_id,
            'brand_id' => $request->brand_id,
            'vendor_id' => $request->vendor_id ? $request->vendor_id : Auth::id(),
            'name' => $request->name,
            'price' => $request->price,
            'discount' => $request->discount,
            'slug' => Str::slug($request->name),
            'qty' => $request->qty,
            'color' => $request->color,
            'size' => $request->size,
            'long_desc' => $request->long_desc,
            'short_desc' => $request->short_desc,
            'specification' => $request->specification,
            'product_thumbnail' => $filename,
            'product_code' => $request->product_code,
            'weight' => $request->weight,
            'featured' => $request->featured,
            'new_product' => $request->new_product,
            'tags' => $request->tags,
            'best_offer' => $request->best_offer,
            'best_seller' => $request->best_seller,
            'special_offer' => $request->special_offer,
            'top_product' => $request->top_product,
            'video_url' => $request->video_url,
            'status' => 'active',
        ]);
//        dd($product);
        if ($request->hasFile('multiImage'))
        {
            foreach ($request->file('multiImage') as $image)
            {
                $img_filename = Str::uuid().'.'.$image->getClientOriginalExtension();
                $img_manager = new ImageManager(Driver::class);
                $img_manager->read($image)->scale(height: 550)->toPng()->save('uploads/product/'.$img_filename);
                $img_filename = 'uploads/product/'.$img_filename;
            }
        }
        ProductMultiImage::create([
            'product_id' => $product->id,
            'name' => $img_filename,
        ]);

        return redirect()->route('product.home')->with([
            'message' => 'Product added successfully!!!',
            'type' => 'success'
        ]);
    }

    public function edit(Product $product)
    {
        $categories = ProductCategory::all();
        $subcategories = ProductSubcategory::all();
        $brands = Brand::all();
        $vendors = User::where('role', 'vendor')->orderBy('name', 'DESC')->get();
//        dd($product);
        return view('backend.product.edit_product', compact('categories', 'subcategories', 'product', 'brands', 'vendors'));
    }

    public function show(Product $product)
    {
//        dd($product);
        $categories = ProductCategory::all();
        $subcategories = ProductSubcategory::all();
        return view('backend.product.edit_product', compact('categories', 'subcategories', 'product'));
    }

    public function update(Product $product, Request $request)
    {
        $request->validate([
            'product_category_id' => 'required',
            'product_subcategory_id' => 'required',
            'brand_id' => 'required',
            'name' => 'required',
            'short_desc' => 'required',
            'long_desc' => 'required',
            'specification' => 'required',
            'price' => 'required',
            'qty' => 'required',
            'product_code' => 'required',
        ]);

        if ($request->hasFile('product_thumbnail')){
            $img = $request->file('product_thumbnail');
            $filename = Str::uuid().'.'.$img->getClientOriginalExtension();
            $manager = new ImageManager(Driver::class);
            $manager->read($img)->scale(height: 550)->toPng()->save('uploads/product/'.$filename);
            $filename = 'uploads/product/'.$filename;
            $product->update([
                'product_thumbnail' => $filename,
                ]);
        }

        $product->update([
            'product_category_id' => $request->product_category_id,
            'product_subcategory_id' => $request->product_subcategory_id,
            'brand_id' => $request->brand_id,
            'vendor_id' => $request->vendor_id ? $request->vendor_id : Auth::id(),
            'name' => $request->name,
            'price' => $request->price,
            'discount' => $request->discount,
            'slug' => Str::slug($request->name),
            'qty' => $request->qty,
            'color' => $request->color,
            'size' => $request->size,
            'long_desc' => $request->long_desc,
            'short_desc' => $request->short_desc,
            'specification' => $request->specification,
            'product_code' => $request->product_code,
            'weight' => $request->weight,
            'featured' => $request->featured,
            'new_product' => $request->new_product,
            'tags' => $request->tags,
            'best_offer' => $request->best_offer,
            'best_seller' => $request->best_seller,
            'special_offer' => $request->special_offer,
            'top_product' => $request->top_product,
            'video_url' => $request->video_url,
            'status' => 'active',
        ]);
//        dd($product);
//        if ($request->hasFile('multiImage'))
//        {
//            foreach ($request->file('multiImage') as $image)
//            {
//                $img_filename = Str::uuid().'.'.$image->getClientOriginalExtension();
//                $img_manager = new ImageManager(Driver::class);
//                $img_manager->read($image)->scale(height: 550)->toPng()->save('uploads/product/'.$img_filename);
//                $img_filename = 'uploads/product/'.$img_filename;
//                ProductMultiImage::create([
//                    'product_id' => $product->id,
//                    'name' => $img_filename,
//                ]);
//            }
//        }

        return redirect()->route('product.home')->with([
            'message' => 'Product updated successfully!!!',
            'type' => 'success'
        ]);
    }

    public function destroy(Product $product)
    {
        if ($product->product_thumbnail)
        {
            unlink($product->product_thumbnail);
        }

        $product->delete();

        return redirect()->route('product.home')->with([
            'message' => 'Product deleted successfully!!!',
            'type' => 'success'
        ]);
    }
}
