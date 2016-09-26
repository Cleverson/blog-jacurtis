<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\Category;
use Session;

class PostController extends Controller
{
    // public function __construct()
    // {
    //   $this->middleware('auth');
    // }

    public function index()
    {
      //$posts = Post::all();
      $posts = Post::orderBy('id','desc')->paginate(10);
      return view('posts.index')->withPosts($posts);
    }

    public function create()
    {
      $categories = Category::all();
      return view('posts.create')->withCategories($categories);
    }

    public function store(Request $request)
    {
      // Validate the data
      $this->validate($request,[
        'title'       => 'required|max:255',
        'slug'        => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
        'category_id' => 'required|integer',
        'body'        => 'required'
      ]);

      //store the database
      $post = new Post;
      $post->title        = $request->title;
      $post->slug         = $request->slug;
      $post->category_id  = $request->category_id;
      $post->body         = $request->body;
      $post->save();
      Session::flash('success','The blog post was successfully save!');

      //redirect to another page
      return redirect()->route('posts.show', $post->id);

    }

    public function show($id)
    {
      $post = Post::find($id);
      return view('posts.show')->withPost($post);
    }

    public function edit($id)
    {
      $post = Post::find($id);
      $categories = Category::all();
      $cats = array();
      foreach ($categories as $category) {
        $cats[$category->id] = $category->name;
      }
      return view('posts.edit')->withPost($post)->withCategories($cats);

    }

    public function update(Request $request, $id)
    {
      $post = Post::find($id);

      // Validate the data
      if ($request->input('slug') == $post->slug) {
        $this->validate($request, [
          'title' => 'required|max:255',
          'category_id' => 'required|integer',
          'body'  => 'required'
        ]);
      } else {
        $this->validate($request,[
          'title' => 'required|max:255',
          'slug'  => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
          'category_id' => 'required|integer',
          'body'  => 'required'
        ]);
      }
      //store the database
      $post->title = $request->title;
      $post->slug  = $request->slug;
      $post->category_id = $request->category_id;
      $post->body = $request->body;
      $post->save();
      Session::flash('success', 'This post was successfully saved.');

      //redirect to another page
      return redirect()->route('posts.show', $post->id);

    }

    public function destroy($id)
    {
      $post = Post::find($id);
      $post->delete();
      Session::flash('success', 'This post was successfully delete.');
      return redirect()->route('posts.index');
    }

}
