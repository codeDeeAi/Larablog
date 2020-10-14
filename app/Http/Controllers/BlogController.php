<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request){

        $categories = Category::all();
        $blogs = Blog::orderBy('id','desc')->with(['cat', 'user'])->limit(3)->get([
            'id', 'title', 'post_except', 'userId', 'date', 'featuredImage'
        ]);

        return view('welcome')->with(['categories' => $categories, 'blogs' => $blogs, ]);
    }
    public function getSliderBlogs(Request $request){

        $blogOne = Blog::orderBy('id','desc')->with(['cat', 'user'])->limit(1)->get([
            'id', 'title', 'post_except', 'userId', 'date', 'featuredImage'
        ]);

        $blogs = Blog::orderBy('id','desc')->with(['cat', 'user'])->limit(2)->get([
            'id', 'title', 'post_except', 'userId', 'date', 'featuredImage', 
        ]);

        return response()->json([
            'blogs'=> $blogs,
            'blogOne'=> $blogOne,
        ]);
    }
}
