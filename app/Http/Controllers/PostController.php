<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use Session;

class PostController extends Controller
{

    public function index()
    {
      //$posts = Post::all();
      $posts = Post::orderBy('id','desc')->paginate(10);
      return view('posts.index')->withPosts($posts);
    }

    public function create()
    {
      return view('posts.create');
    }

    public function store(Request $request)
    {
      // Validate the data
      $this->validate($request,[
        'title' => 'required|max:255',
        'body'  => 'required'
      ]);

      //store the database
      $post = new Post;
      $post->title = $request->title;
      $post->body  = $request->body;
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
      return view('posts.edit')->withPost($post);

    }

    public function update(Request $request, $id)
    {
      // Validate the data
      $this->validate($request,[
        'title' => 'required|max:255',
        'body'  => 'required'
      ]);

      //store the database
      $post = Post::find($id);
      $post->title = $request->title;
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
