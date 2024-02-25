<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\HomeSlide;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class HomeSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function homeSlider()
    {
        $homeSlide = HomeSlide::find(1);
        return view('admin.home_slide.index', compact('homeSlide'));
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
    public function updateSlider(Request $request)
    {
        $slider_id = $request->id;
        if ($request->file('home_slide'))
        {
            $image = $request->file('home_slide');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(636, 852)->save('upload/admin/home_slider/'.$name_gen);

            $save_url = 'upload/admin/home_slider/'.$name_gen;

            HomeSlide::findOrFail($slider_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'home_slide' => $save_url,
                'video_url' => $request->video_url
            ]);

            return redirect()->back()->with([
                'message' => 'Home Slide updated with image successfully!',
                'alert' => 'success'
            ]);
        }else{
            HomeSlide::findOrFail($slider_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url
            ]);

            return redirect()->back()->with([
                'message' => 'Home Slide updated without image successfully!',
                'alert' => 'success'
            ]);
        }
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
