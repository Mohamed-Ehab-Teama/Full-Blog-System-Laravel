<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if( Auth::check() )
        {
            $selectCategories = Category::get();
            return view('theme.blogs.create' , compact('selectCategories'));
        }
        abort(403);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
