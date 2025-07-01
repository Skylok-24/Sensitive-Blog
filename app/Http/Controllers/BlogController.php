<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBlogForm;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only([
            'create'
        ]);
    }

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
        $categories = Category::get();
        return view('theme.blogs.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogForm $request)
    {
        $data = $request->validated();
        // uploading Image
        // 1 - get image
        $image = $request->image;
        // 2 - change it's current name
        $newImageName = time() . '-' . $image->getClientOriginalName();
        // 3 - move image to my project
        $image->storeAs('blogs',$newImageName,'public');
        // 4 - save new name to database record
        $data['image'] = $newImageName;
        $data['user_id'] = Auth::user()->id;
        Blog::create($data);

        return back()->with('blogStatus','Your Blog Created Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('theme.blog-detail',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
       $categories = Category::get();
        return view('theme.blogs.edit',compact('categories','blog')); 
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

    // display user blogs
    public function myBlogs()
    {
        if(Auth::check()) 
        {

        $blogs = Blog::where('user_id',Auth::user()->id)->paginate(10);
        return view('theme.blogs.myBlogs',compact('blogs'));
        }
        abort(403);
    }
}
