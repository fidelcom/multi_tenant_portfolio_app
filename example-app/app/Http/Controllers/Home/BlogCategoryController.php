<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\MultiImage;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function allBlogCategory()
    {
        $blogCategory = BlogCategory::latest()->get();

        return view('admin.blog_category.blog_category_all', compact('blogCategory'));
    }

    public function addBlogCategory()
    {
        return view('admin.blog_category.blog_category_add');
    }

    public function storeBlogCategory(Request $request)
    {
        $request->validate([
            'blog_category' => 'required|string'
        ],
        [
            'blog_category.required' => 'Blog Category Name is required'
        ]);

        BlogCategory::create([
            'blog_category' => $request->blog_category
        ]);

        return redirect()->route('all.blog.category')->with([
            'message' => 'Blog Category Created Successfully!',
            'alert-type' => 'success'
        ]);
    }

    public function editBlogCategory($id)
    {
        $editBlogCategory = BlogCategory::findOrFail($id);
        return view('admin.blog_category.blog_category_edit', compact('editBlogCategory'));
    }

    public function updateBlogCategory(Request $request, $id)
    {
        $request->validate([
            'blog_category' => 'required|string'
        ],
            [
                'blog_category.required' => 'Blog Category Name is required'
            ]);

        BlogCategory::findOrFail($id)->update([
            'blog_category' => $request->blog_category
        ]);

        return redirect()->route('all.blog.category')->with([
            'message' => 'Blog Category Updated Successfully!',
            'alert-type' => 'success'
        ]);
    }
    public function deleteBlogCategory(string $id)
    {
        BlogCategory::findOrFail($id)->delete();

        return redirect()->back()->with([
            'message' => 'Blog deleted successfully!',
            'alert' => 'success'
        ]);
    }
}
