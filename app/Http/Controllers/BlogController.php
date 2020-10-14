<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // ====================================INDEX=======================
    public function index(Request $request){

        $categories = Category::all();
        $blogs = Blog::orderBy('id','desc')->with(['cat', 'user'])->limit(3)->get([
            'id', 'title', 'post_except', 'userId', 'date', 'featuredImage'
        ]);

        return view('welcome')->with(['categories' => $categories, 'blogs' => $blogs, ]);
    }
    // ====================================INDEX ENDS=======================


    // ====================================GET SLIDER BLOGS=======================
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
    // ====================================GET SLIDER BLOGS ENDS=======================


// ====================================GET HOME BLOGS=======================
    public function getHomeBlogs(Request $request){

        $blogs = Blog::orderBy('id','desc')->with(['cat', 'user'])->get([
            'id', 'title', 'post_except', 'userId', 'date', 'featuredImage', 
        ]);

        return response()->json([
            'blogs'=> $blogs
        ]);
    }
    // ====================================GET HOME BLOGS ENDS=======================


    // ====================================GET POPULAR BLOGS ENDS=======================

    public function getPopularBlogs(Request $request){
        $blogs = Blog::orderBy('id','desc')->with(['cat', 'user'])->limit(6)->get([
            'id', 'title', 'post_except', 'userId', 'date', 'featuredImage', 
        ]);

        return response()->json([
            'blogs'=> $blogs
        ]);
    }
    // ====================================GET POPULAR BLOGS ENDS=======================


    // ====================================GET HOME TAGS =======================
        public function getHomeTags(){
            $tags = Tag::orderBy('id','desc')->get([
                'name' 
            ]);
    
            return response()->json([
                'tags'=> $tags
            ]);
        }
    // ====================================GET HOME TAGS ENDS =======================


     // ==================================== SINGLE BLOG     =======================

        public function singleBlog(Request $request, $id){

            $categories = Category::select('id', 'categoryName')->get();

            $blog = Blog::where('id' , $id)->with(['cat', 'tag','user'])->first([
                'id', 'title', 'post', 'userId', 'date', 'featuredImage', 
            ]);
            return view('singleblog')->with(['categories'=> $categories, 'blog'=>$blog]);
        }
    // ====================================SINGLE BlOG ENDS =======================



}
