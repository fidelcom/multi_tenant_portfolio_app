<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::all();
        return view('backend.product_category.all_categories', compact('categories'));
    }

    public function create()
    {
        return view('backend.product_category.create_category');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required',
        ]);

        $img = $request->file('image');
        $filename = Str::uuid().'.'.$img->getClientOriginalExtension();
        $manager = new ImageManager(Driver::class);
        $manager->read($img)->scale(height: 550)->toPng()->save('uploads/product_category/'.$filename);
        $filename = 'uploads/product_category/'.$filename;


        ProductCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'desc' => $request->desc,
            'image' => $filename,
        ]);

        return redirect()->route('product.categories.home')->with([
            'message' => 'Product category created successfully!!!',
            'type' => 'success'
        ]);
    }

    public function edit(ProductCategory $category)
    {
        return view('backend.product_category.edit_category', compact('category'));
    }

    public function update(ProductCategory $category, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'desc' => 'required',
        ]);

        if ($request->hasFile('image'))
        {
            $img = $request->file('image');
            $filename = Str::uuid().'.'.$img->getClientOriginalExtension();
            $manager = new ImageManager(Driver::class);
            $manager->read($img)->scale(height: 550)->toPng()->save('uploads/product_category/'.$filename);
            $filename = 'uploads/product_category/'.$filename;

            $category->update([
                'image' => $filename,
            ]);
        }
        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'desc' => $request->desc,
        ]);

        return redirect()->route('product.categories.home')->with([
            'message' => 'Product category updated successfully!!!',
            'type' => 'success'
        ]);
    }

    public function destroy(ProductCategory $category)
    {
        if ($category->image)
        {
            unlink($category->image);
        }
        $category->delete();

        return redirect()->route('product.categories.home')->with([
            'message' => 'Product category deleted successfully!!!',
            'type' => 'success'
        ]);
    }
}
