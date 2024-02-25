<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();
//        $blogs->blogCategory();

        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $blog_category = BlogCategory::all();
        return view('admin.blog.create', compact('blog_category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'blog_category_id' => 'required',
            'title' => 'required',
            'tags' => 'required',
            'description' => 'required',
        ],
        [
            'blog_category_id.require' => 'Blog Category is required',
            'title.required' => 'Blog title is required',
            'tags.required' => 'Blog tags are required',
            'description.required' => 'Blog details is required'
        ]);
        if ($request->file('image'))
        {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(430, 327)->save('upload/admin/blog/'.$name_gen);

            $save_url = 'upload/admin/blog/'.$name_gen;

            Blog::create([
                'blog_category_id' => $request->blog_category_id,
                'title' => $request->title,
                'tags' => $request->tags,
                'image' => $save_url,
                'description' => $request->description,
            ]);

            return redirect()->route('blog.index')->with([
                'message' => 'Blog created with image successfully!',
                'alert' => 'success'
            ]);
        }else{
            Blog::create([
                'blog_category_id' => $request->blog_category_id,
                'title' => $request->title,
                'tags' => $request->tags,
                'description' => $request->short_description,
            ]);

            return redirect()->route('blog.index')->with([
                'message' => 'Blog created without image successfully!',
                'alert' => 'success'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $blog_category = BlogCategory::all();
        return view('admin.blog.edit', compact('blog', 'blog_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Blog $blog, Request $request)
    {
        $request->validate([
            'blog_category_id' => 'required',
            'title' => 'required',
            'tags' => 'required',
            'description' => 'required',
        ],
            [
                'blog_category_id.require' => 'Blog Category is required',
                'title.required' => 'Blog title is required',
                'tags.required' => 'Blog tags are required',
                'description.required' => 'Blog details is required'
            ]);
        if ($request->file('image'))
        {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(430, 327)->save('upload/admin/blog/'.$name_gen);

            $save_url = 'upload/admin/blog/'.$name_gen;

            $blog->update([
                'blog_category_id' => $request->blog_category_id,
                'title' => $request->title,
                'tags' => $request->tags,
                'image' => $save_url,
                'description' => $request->description,
            ]);

            return redirect()->route('blog.index')->with([
                'message' => 'Blog updated with image successfully!',
                'alert' => 'success'
            ]);
        }else{
            $blog->update([
                'blog_category_id' => $request->blog_category_id,
                'title' => $request->title,
                'tags' => $request->tags,
                'description' => $request->description,
            ]);

            return redirect()->route('blog.index')->with([
                'message' => 'Blog updated without image successfully!',
                'alert' => 'success'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

    }

    public function del($id)
    {
        Blog::findOrFail($id)->delete();
        return redirect()->back()->with([
            'message' => 'Blog deleted successfully!',
            'alert' => 'success'
        ]);
    }
}
