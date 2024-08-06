<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class SliderController extends Controller
{
    public function index()
    {
        $slider = Slider::all();
        return view('admin.slider.all_slider', compact('slider'));
    }

    public function create()
    {
        return view('admin.slider.create_slider');
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
        $manager->read($img)->scale(height: 550)->toPng()->save('uploads/slider/'.$filename);
        $filename = 'uploads/slider/'.$filename;


        Slider::create([
            'title' => $request->title,
            'url' => $request->url,
            'desc' => $request->desc,
            'image' => $filename,
        ]);

        return redirect()->route('slider.home')->with([
            'message' => 'Slider created successfully!!!',
            'type' => 'success'
        ]);
    }

    public function edit(Slider $slider)
    {
        return view('admin.slider.edit_slider', compact('slider'));
    }

    public function update(Slider $slider, Request $request)
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
            $manager->read($img)->scale(height: 550)->toPng()->save('uploads/slider/'.$filename);
            $filename = 'uploads/slider/'.$filename;
            if ($slider->image)
            {
                unlink($slider->image);
            }
            $slider->update([
                'image' => $filename,
            ]);
        }

        $slider->update([
            'title' => $request->title,
            'url' => $request->url,
            'desc' => $request->desc,
        ]);

        return redirect()->route('slider.home')->with([
            'message' => 'Slider updated successfully!!!',
            'type' => 'success'
        ]);
    }

    public function destroy(Slider $slider)
    {
        if ($slider->image)
        {
            unlink($slider->image);
        }
        $slider->delete();
        return redirect()->route('slider.home')->with([
            'message' => 'Slider deleted successfully!!!',
            'type' => 'success'
        ]);
    }
}
