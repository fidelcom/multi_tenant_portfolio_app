<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class BannerController extends Controller
{
    public function index()
    {
        $banner = Banner::all();
        return view('admin.banner.all_banner', compact('banner'));
    }

    public function create()
    {
        return view('admin.banner.create_banner');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required',
        ]);

        $img = $request->file('image');
        $filename = Str::uuid().'.'.$img->getClientOriginalExtension();
        $manager = new ImageManager(Driver::class);
        $manager->read($img)->scale(height: 550)->toPng()->save('uploads/banner/'.$filename);
        $filename = 'uploads/banner/'.$filename;


        Banner::create([
            'title' => $request->title,
            'url' => $request->url,
            'desc' => $request->desc,
            'image' => $filename,
        ]);

        return redirect()->route('banner.home')->with([
            'message' => 'Banner created successfully!!!',
            'type' => 'success'
        ]);
    }

    public function edit(Banner $banner)
    {
        return view('admin.banner.edit_banner', compact('banner'));
    }

    public function update(Banner $banner, Request $request)
    {
        $request->validate([
            'title' => 'required',
            'url' => 'required',
        ]);

        if ($request->hasFile('image'))
        {
            $img = $request->file('image');
            $filename = Str::uuid().'.'.$img->getClientOriginalExtension();
            $manager = new ImageManager(Driver::class);
            $manager->read($img)->scale(height: 550)->toPng()->save('uploads/banner/'.$filename);
            $filename = 'uploads/banner/'.$filename;
            if ($banner->image)
            {
                unlink($banner->image);
            }
            $banner->update([
                'image' => $filename,
            ]);
        }

        $banner->update([
            'title' => $request->title,
            'url' => $request->url,
            'desc' => $request->desc,
        ]);

        return redirect()->route('banner.home')->with([
            'message' => 'Banner updated successfully!!!',
            'type' => 'success'
        ]);
    }

    public function destroy(Banner $banner)
    {
        if ($banner->image)
        {
            unlink($banner->image);
        }
        $banner->delete();
        return redirect()->route('banner.home')->with([
            'message' => 'Banner deleted successfully!!!',
            'type' => 'success'
        ]);
    }
}
