<?php

namespace App\Http\Controllers;

use App\Models\Post;
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

        $all_post = Post::latest() ->paginate(2);
        return view('frontend.blog',compact('all_post'));
    }

    /**
     *  for blog page show in single page
     */
    public function singlePost($slug){

       $single_post = Post:: where('slug',$slug) -> first();

        return view('frontend.blog-single',compact('single_post'));
    }
}
