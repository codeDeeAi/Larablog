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
        $tags = Tag::select('id', 'name')->get();
        $blogs = Blog::orderBy('id','desc')->with(['cat', 'user'])->limit(3)->get([
            'id', 'title', 'post_except', 'userId', 'date', 'featuredImage', 'slug'
        ]);

        return view('welcome')->with(['categories' => $categories, 'blogs' => $blogs, 'tags' => $tags,]);
    }
    // ====================================INDEX ENDS=======================


    // ====================================GET SLIDER BLOGS=======================
    public function getSliderBlogs(Request $request){

        $blogOne = Blog::orderBy('id','desc')->with(['cat', 'user'])->limit(1)->get([
            'id', 'title', 'post_except', 'userId', 'date', 'featuredImage', 'slug'
        ]);

        $blogs = Blog::orderBy('id','desc')->with(['cat', 'user'])->limit(2)->get([
            'id', 'title', 'post_except', 'userId', 'date', 'featuredImage',  'slug'
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
            'id', 'title', 'post_except', 'userId', 'date', 'featuredImage', 'slug'
        ]);

        return response()->json([
            'blogs'=> $blogs
        ]);
    }
    // ====================================GET HOME BLOGS ENDS=======================


    // ====================================GET POPULAR BLOGS ENDS=======================

    public function getPopularBlogs(Request $request){
        $blogs = Blog::orderBy('id','desc')->with(['cat', 'user'])->limit(6)->get([
            'id', 'title', 'post_except', 'userId', 'date', 'featuredImage', 'slug'
        ]);

        return response()->json([
            'blogs'=> $blogs
        ]);
    }
    // ====================================GET POPULAR BLOGS ENDS=======================


    // ====================================GET HOME TAGS =======================
        public function getHomeTags(){
            $tags = Tag::orderBy('id','desc')->get([
                'id','name' 
            ]);
    
            return response()->json([
                'tags'=> $tags
            ]);
        }
    // ====================================GET HOME TAGS ENDS =======================


     // ==================================== SINGLE BLOG     =======================

        public function singleBlog(Request $request, $id, $slug){

            $categories = Category::select('id', 'categoryName')->get();

            $blog = Blog::where('id' , $id)->with(['cat', 'tag','user'])->first([
                'id', 'title', 'post', 'userId', 'date', 'featuredImage', 'slug'
            ]);
            $tags = Tag::select('id', 'name')->get();

            $category_ids = [];
            foreach($blog->cat as $cat){
                array_push($category_ids, $cat->id);
            }

            $related = Blog::whereHas('cat', function($q) use($category_ids){
                $q->whereIn('category_id', $category_ids);
            })->limit(2)->orderBy('id', 'desc')->get(['id', 'title', 'slug']);
            return view('singleblog')->with(['categories'=> $categories, 'blog'=>$blog, 'related'=>$related, 'tags'=>$tags]);
        }
    // ====================================SINGLE BlOG ENDS =======================

     // ====================================BlOG  CATEGORIES PAGE =======================
    public function categoryIndex(Request $request , $categoryName, $id){
        $categories = Category::select('id', 'categoryName')->get();
        $tags = Tag::select('id', 'name')->get();

        $blogs = Blog::with('user')->whereHas('cat', function($q) use($id){
            $q->where('category_id', $id);
        })->orderBy('id', 'desc')->select(['id', 'title', 'post_except', 'userId', 'date', 'featuredImage', 'slug' ])->paginate(16);

        return view('category')->with(['blogs'=> $blogs, 'categories'=> $categories, 'tags'=>$tags]);
    }
     // =================================== BlOG CATEGORIES PAGE ENDS =======================


     // ====================================BlOG  TAGS PAGE =======================
    public function tagIndex(Request $request , $name, $id){
        $categories = Category::select('id', 'categoryName')->get();
        $tags = Tag::select('id', 'name')->get();

        $blogs = Blog::with('user')->whereHas('tag', function($q) use($id){
            $q->where('tag_id', $id);
        })->orderBy('id', 'desc')->select(['id', 'title', 'post_except', 'userId', 'date', 'featuredImage', 'slug' ])->paginate(16);

        return view('tag')->with(['blogs'=> $blogs, 'categories'=> $categories, 'tags'=>$tags]);
    }
     // =================================== BlOG TAGS PAGE ENDS =======================

     // =================================== ALL BlOGS PAGE =======================
     public function allBlogs(Request $request){
        $categories = Category::all();
        $tags = Tag::select('id', 'name')->get();
        $blogs = Blog::orderBy('id','desc')->with(['cat', 'user'])->select([
            'id', 'title', 'post_except', 'userId', 'date', 'featuredImage', 'slug'
        ])->paginate(16);

        return view('allblogs')->with(['categories' => $categories, 'blogs' => $blogs, 'tags' => $tags,]);
     }
      // =================================== ALL BlOGS PAGE ENDS =======================
      

      // =================================== ABOUT US PAGE =======================
     public function aboutUsPage(Request $request){
        $categories = Category::all();
        $tags = Tag::select('id', 'name')->get();

        return view('about')->with(['categories' => $categories,  'tags' => $tags,]);
     }
      // =================================== ABOUT US PAGE ENDS =======================

       // =================================== CONTACT US  PAGE =======================
     public function contactUsPage(Request $request){
        $categories = Category::all();
        $tags = Tag::select('id', 'name')->get();

        return view('contact')->with(['categories' => $categories,  'tags' => $tags,]);
     }
      // =================================== CONTACT US  PAGE ENDS =======================


      public function search(Request $request){
        $str = $request->str;

        $categories = Category::all();
        $tags = Tag::select('id', 'name')->get();
        $blogs = Blog::orderBy('id','desc')->with(['cat', 'user', 'tag'])->select([
            'id', 'title', 'post_except', 'userId', 'date', 'featuredImage', 'slug'
        ]);

        if(!$str){
            return $blogs->get();
        }
        if ($str) {
            $blogs->where('title', 'LIKE', '%'.$str.'%')
            ->orWhereHas('cat', function($q) use($str){
                $q->where('categoryName', $str);
            })
            ->orWhereHas('tag', function($q) use($str){
                $q->where('name', $str);
            });           
        }
       if($blogs->count() < 1){
            
            return response()->json([
                'message' => 'No match found'
            ]);
            }
        else{

            $get =  $blogs->paginate(16);
            return view('search')->with(['categories' => $categories, 'blogs' => $get, 'tags' => $tags]);
        }
        
      }
}
