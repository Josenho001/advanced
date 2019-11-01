<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Session;
use App\Tag;
use App\Comment;

class PostController extends Controller
{

 public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //create a variable and store all the posts
        $posts = Post::orderBy('id', 'desc')->paginate(5);
        //returna view and and pass in the above variable
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories =Category::all();
        $tags=Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //validate
        $this->validate($request, array(
            'title'        =>  'required|max:255',
            'slug'         =>  'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id'  =>  'required|integer',
            'body'         =>  'required'
        ));
        //store
        $post = new Post;
        $post->title= $request->title;
        $post->slug= $request->slug;
        $post->category_id=$request->category_id;
        $post->body= $request->body;

        $post->save();
        $post->tags()->sync($request->tags,false);

        // Session::flash('success','The blog post was successfully saved!');

        //return
        return redirect()->route('posts.show', $post->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $post = Post::find($id);
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find the postb in db and save it as a variable
        
        $post = Post::find($id);
        $categories = Category::all();
        $cats = [];
        foreach ($categories as $category) {
            $cats[$category->id]= $category->name;
        }
        $tags= Tag::all();
        $tags2=array();
        foreach ($tags as $tag) {
            $tags2[$tag->id]=$tag->name;
        }

        //return a view andreturn it in the var we created
        return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tags2);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validate the data
        $post = Post::find($id);
        if ($request->input('slug')== $post->slug) {
            
          $this->validate($request, array(
            'title'=>'required|max:255',
            'category_id'=>'required|integer',
            //'slug'=>'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'body'=>'required'
            ));
        }else{
          $this->validate($request, array(
            'title'=>'required|max:255',
            'slug'=>'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id'=>'required|integer',
            'body'=>'required'
        ));
          }
        //save the data in db
          $post = Post::find($id);

          $post->title = $request->input('title');
          $post->slug=$request->input('slug');
          $post->category_id=$request->input('category_id');
          $post->body = $request->input('body');
          $post->save();

          if (isset($request->tags)) {
          $post->tags()->sync($request->tags);
          }else{
            $post->tags()->sync(array());
          }

        //set flash with success msg
          $request->session()->flash('status', 'Task was successful!');

          Session::flash('success','This post was successfully saved');
        //redirect with flash data
          return redirect()->route('posts.show',$post->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find post
        $post = Post::find($id);
        $post->tags()->detach();
        $post->delete();

        Session::flash('success','The post was successfully deleted.');
        return redirect()->route('posts.index');
    }
}
