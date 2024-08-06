<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class BrandController extends Controller
{
    public function index()
    {
        $brand = Brand::all();
        return view('backend.brand.all_brand', compact('brand'));
    }

    public function create()
    {
        return view('backend.brand.create_brand');
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
        $manager->read($img)->scale(height: 550)->toPng()->save('uploads/brand/'.$filename);
        $filename = 'uploads/brand/'.$filename;


        Brand::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'desc' => $request->desc,
            'image' => $filename,
        ]);

        return redirect()->route('brand.home')->with([
            'message' => 'Brand created successfully!!!',
            'type' => 'success'
        ]);
    }

    public function edit(Brand $brand)
    {
        return view('backend.brand.edit_Brand', compact('brand'));
    }

    public function update(Brand $brand, Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        if ($request->hasFile('image'))
        {
            $img = $request->file('image');
            $filename = Str::uuid().'.'.$img->getClientOriginalExtension();
            $manager = new ImageManager(Driver::class);
            $manager->read($img)->scale(height: 550)->toPng()->save('uploads/brand/'.$filename);
            $filename = 'uploads/brand/'.$filename;
            if ($brand->image)
            {
                unlink($brand->image);
            }
            $brand->update([
                'image' => $filename,
            ]);
        }

        $brand->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'desc' => $request->desc,
        ]);

        return redirect()->route('brand.home')->with([
            'message' => 'Brand updated successfully!!!',
            'type' => 'success'
        ]);
    }

    public function destroy(Brand $brand)
    {
        if ($brand->image)
        {
            unlink($brand->image);
        }
        $brand->delete();
        return redirect()->route('brand.home')->with([
            'message' => 'Brand deleted successfully!!!',
            'type' => 'success'
        ]);
    }
}
