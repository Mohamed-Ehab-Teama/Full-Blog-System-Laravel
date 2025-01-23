<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function index(){
        $allBlogs = Blog::paginate(4);

        return view('theme.index', compact('allBlogs'));
    }

    public function category($id){

        $catBlogs = Blog::where('category_id', $id)->paginate(6);

        return view('theme.category', compact('catBlogs'));
    }

    public function contact(){
        return view('theme.contact');
    }
    
    
}
