<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductMultiImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ProductMultiImageController extends Controller
{
    public function store(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);
        if ($request->hasFile('multiImage'))
        {
            foreach ($request->file('multiImage') as $image)
            {
                $img_filename = Str::uuid().'.'.$image->getClientOriginalExtension();
                $img_manager = new ImageManager(Driver::class);
                $img_manager->read($image)->scale(height: 550)->toPng()->save('uploads/product/'.$img_filename);
                $img_filename = 'uploads/product/'.$img_filename;
                ProductMultiImage::create([
                    'product_id' => $product->id,
                    'name' => $img_filename,
                ]);
            }
        }

        return redirect()->back()->with([
            'message' => 'Product multi image added successfully!!!',
            'type' => 'success'
        ]);
    }

    public function destroy($id)
    {
        $image = ProductMultiImage::findOrFail($id);
        unlink($image->name);
        $image->delete();

        return redirect()->back()->with([
            'message' => 'Product multi image deleted successfully!!!',
            'type' => 'success'
        ]);
    }
}
