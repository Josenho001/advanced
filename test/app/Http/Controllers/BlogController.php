<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class BlogController extends Controller
{
    public function getSingle($slug){
    	//fetch from db based on slug
    	$post = Post::where('slug','=',$slug)->first();
    	//return view and pass in the objects
    	return view('blog.single')->withPost($post);

    }
    public function getIndex(){

    	$posts = Post::paginate(3);
    	return view('blog.index')->withPosts($posts); 
    }
}
