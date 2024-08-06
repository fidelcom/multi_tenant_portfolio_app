<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\ProductSubcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ProductSubcategoryController extends Controller
{
    public function index()
    {
        $subcategories = ProductSubcategory::all();
        return view('backend.product_subcategory.all_subcategories', compact('subcategories'));
    }

    public function create()
    {
        $categories = ProductCategory::orderBy('name', 'DESC')->get();
        return view('backend.product_subcategory.create_subcategory', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_category_id' => 'required',
            'name' => 'required',
            'image' => 'required',
        ]);

        $img = $request->file('image');
        $filename = Str::uuid().'.'.$img->getClientOriginalExtension();
        $manager = new ImageManager(Driver::class);
        $manager->read($img)->scale(height: 550)->toPng()->save('uploads/product_subcategory/'.$filename);
        $filename = 'uploads/product_subcategory/'.$filename;


        ProductSubcategory::create([
            'product_category_id' => $request->product_category_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'desc' => $request->desc,
            'image' => $filename,
        ]);

        return redirect()->route('product.subcategories.home')->with([
            'message' => 'Product subcategory created successfully!!!',
            'type' => 'success'
        ]);
    }

    public function edit(ProductSubcategory $subcategory)
    {
        $categories = ProductCategory::orderBy('name', 'DESC')->get();
        return view('backend.product_subcategory.edit_subcategory', compact('subcategory', 'categories'));
    }

    public function update(ProductSubcategory $subcategory, Request $request)
    {
        $request->validate([
            'product_category_id' => 'required',
            'name' => 'required',
            'desc' => 'required',
        ]);

        if ($request->hasFile('image'))
        {
            $img = $request->file('image');
            $filename = Str::uuid().'.'.$img->getClientOriginalExtension();
            $manager = new ImageManager(Driver::class);
            $manager->read($img)->scale(height: 550)->toPng()->save('uploads/product_subcategory/'.$filename);
            $filename = 'uploads/product_subcategory/'.$filename;

            $subcategory->update([
                'image' => $filename,
            ]);
        }
        $subcategory->update([
            'product_category_id' => $request->product_category_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'desc' => $request->desc,
        ]);

        return redirect()->route('product.subcategories.home')->with([
            'message' => 'Product subcategory updated successfully!!!',
            'type' => 'success'
        ]);
    }

    public function destroy(ProductSubcategory $subcategory)
    {
        if ($subcategory->image)
        {
            unlink($subcategory->image);
        }
        $subcategory->delete();

        return redirect()->route('product.subcategories.home')->with([
            'message' => 'Product subcategory deleted successfully!!!',
            'type' => 'success'
        ]);
    }

    public function getSubcategories($categoryId)
    {
        $subcategories = ProductSubcategory::where('product_category_id', $categoryId)->get();
        return response()->json($subcategories);
    }
}
