<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function homeAbout()
    {
        $aboutPage = About::find(1);
        return view('frontend.about_page', compact('aboutPage'));
    }

    public function blogDetail($id)
    {
        $allBlogs = Blog::latest()->limit(5)->get();
        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        $blog = Blog::findOrFail($id);
        return view('frontend.blog_details', compact('blog', 'allBlogs', 'categories'));
    }

    public function categoryPost($id)
    {
        $allBlogs = Blog::latest()->limit(5)->get();
        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        $posts = BlogCategory::findOrFail($id)->blog()->orderBy('id', 'DESC')->paginate(10);
        $category_name = BlogCategory::findOrFail($id);
        return view('frontend.category_post', compact('posts', 'allBlogs', 'categories', 'category_name'));
    }

    public function homeBlog()
    {
        $blogs = Blog::latest()->paginate(4);
        $allBlogs = Blog::latest()->limit(5)->get();
        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        return view('frontend.blog', compact( 'allBlogs', 'categories', 'blogs'));
    }
}
