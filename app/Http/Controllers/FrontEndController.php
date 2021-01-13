<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    /**
     *  for Home page show
     */
    public function homePage(){
        return view('frontend.home');
    }

    /**
     * for blog page show and dynamic
     */
    public function blogPage(){

        $all_post = Post::latest() ->paginate(5);
        return view('frontend.blog',compact('all_post'));
    }

    /**
     *  for blog page show in single page
     */
    public function singlePost($slug){

       $single_post = Post:: where('slug',$slug) -> first();

        return view('frontend.blog-single',compact('single_post'));
    }

    /**
     *  post search by category
     */
    public function postByCategory($slug){

        $cats = Category::where('slug',$slug)->first();
        return view('frontend.category-search',compact('cats'));
    }

    /**
     *  post search by tag
     */
    public function postByTag($slug){

        $all_tags = Tag::where('slug',$slug)->first();
        return view('frontend.tag-search',compact('all_tags'));
    }

    /**
     *  post search by search field
     */
    protected function postBySearch(Request $request)
    {
        $search_text = $request -> search;

        $posts = Post::where('title','like','%'.$search_text.'%') -> get();

        return view('frontend.search',compact('posts'));
    }

}
