<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::check()) {
            $selectCategories = Category::get();
            return view('theme.blogs.create', compact('selectCategories'));
        }
        abort(403);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        if (Auth::check()) {
            $data = $request->validated();

            // Image Uploading:
            // 1- Get Image
            $image = $request->image;
            // 2- Change Image's Name
            $newImageName = time() . '--' . $image->getClientOriginalName();
            // 3- Move Image To our project
            $image->storeAs('blogs', $newImageName, 'public');
            // 4- Save the new name to the DB
            $data['image'] = $newImageName;
            $data['user_id'] = Auth::user()->id;

            // Create New Record
            Blog::create($data);

            return back()->with('BlogCreateStatus', "Your Blog have been Created Successfully");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('theme.single-blog', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        if ($blog->user_id == Auth::user()->id) {
            $selectCategories = Category::get();
            return view('theme.blogs.edit', compact('blog', 'selectCategories'));
        }
        abort(403);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        if ($blog->user_id == Auth::user()->id) {

            $data = $request->validated();

            if ($request->hasFile('image')) {
                // Image Uploading:
                // 0- delete Image From Storage
                Storage::delete("public/blogs/$blog->image");
                // 1- Get Image
                $image = $request->image;
                // 2- Change Image's Name
                $newImageName = time() . '--' . $image->getClientOriginalName();
                // 3- Move Image To our project
                $image->storeAs('blogs', $newImageName, 'public');
                // 4- Save the new name to the DB
                $data['image'] = $newImageName;
            }

            // Update Record
            $blog->update($data);

            return back()->with('BlogUpdateStatus', "Your Blog have been Updated Successfully");
        }
        abort(403);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        if ($blog->user_id == Auth::user()->id) {
            // delete Image From Storage
            Storage::delete("public/blogs/$blog->image");
            // Delete the Record:
            $blog->delete();

            return back()->with('BlogDeleteStatus', "Your Blog have been Deleted Successfully");
        }
        abort(403);
    }



    public function myBlogs()
    {
        if (Auth::check()) {
            $myBlogs = Blog::where('user_id', Auth::user()->id)->paginate(5);
            return view('theme.blogs.myBlogs', compact('myBlogs'));
        }
        abort(403);
    }
}
