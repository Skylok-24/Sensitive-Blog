<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function index() 
    {
        $sliderBlogs = Blog::latest()->take(3)->get();
        $blogs = Blog::paginate(4);
        return view('theme.index',compact('blogs','sliderBlogs'));
    }

    public function category($id) 
    {
        $blogs = Blog::where('category_id',$id)->paginate(8);
        return view('theme.category',compact('blogs'));
    }

    public function contact() 
    {
        return view('theme.contact');
    }

    public function login() 
    {
        return view('theme.login');
    }
     
    public function register()
    {
        return view('theme.register');
    }

    public function singleBlog()
    {
        return view('theme.blog-detail');
    }
}