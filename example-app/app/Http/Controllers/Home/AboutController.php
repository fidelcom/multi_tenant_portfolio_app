<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\HomeSlide;
use App\Models\MultiImage;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function aboutPage()
    {
        $aboutPage = About::find(1);
        return view('admin.about_page.index', compact('aboutPage'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function aboutMultiImage()
    {
        $aboutMultiImage = [];
        return view('admin.about_page.multi_image', compact($aboutMultiImage));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function updateAbout(Request $request)
    {
        $about_id = $request->id;
        if ($request->file('about_image'))
        {
            $image = $request->file('about_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(523, 605)->save('upload/admin/home_about/'.$name_gen);

            $save_url = 'upload/admin/home_about/'.$name_gen;

            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'about_image' => $save_url,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
            ]);

            return redirect()->back()->with([
                'message' => 'About page updated with image successfully!',
                'alert' => 'success'
            ]);
        }else{
            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
            ]);

            return redirect()->back()->with([
                'message' => 'About page updated without image successfully!',
                'alert' => 'success'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function storeMultiImage(Request $request)
    {
        $image = $request->file('multi_image');
        foreach ($image as $multiImage)
        {
            $name_gen = hexdec(uniqid()).'.'.$multiImage->getClientOriginalExtension();

            Image::make($multiImage)->resize(220, 220)->save('upload/admin/multi_image/'.$name_gen);

            $save_url = 'upload/admin/multi_image/'.$name_gen;

            MultiImage::create([
                'multi_image' => $save_url
            ]);
        }
        return redirect()->route('all.multi.image')->with([
            'message' => 'Multiple image uploaded successfully!',
            'alert' => 'success'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function allMultiImage()
    {
        $allMultiImage = MultiImage::all();
        return view('admin.about_page.all_multi_image', compact('allMultiImage'));
    }

    public function editMultiImage($id)
    {
        $multiImage = MultiImage::find($id);
        return view('admin.about_page.edit_multi_image', compact('multiImage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateMultiImage(Request $request, string $id)
    {
        if ($request->file('multi_image'))
        {
            $image = $request->file('multi_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(220, 220)->save('upload/admin/multi_image/'.$name_gen);

            $save_url = 'upload/admin/multi_image/'.$name_gen;

            MultiImage::findOrFail($request->id)->update([
                'multi_image' => $save_url,
            ]);

            return redirect()->route('all.multi.image')->with([
                'message' => 'Multi Image updated with image successfully!',
                'alert' => 'success'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteMultiImage(string $id)
    {
        $multi = MultiImage::findOrFail($id);
        $img = $multi->multi_image;
        unlink($img);
        $multi->delete();

        return redirect()->back()->with([
            'message' => 'Multi Image deleted successfully!',
            'alert' => 'success'
        ]);
    }
}
