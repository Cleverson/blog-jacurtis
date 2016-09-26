<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;
use Session;

class CategoryController extends Controller
{
    public function index()
    {
      $categories = Category::all();
      return view('categories.index')->withCategories($categories);
    }

    public function store(Request $request)
    {
      // Validate the data
      $this->validate($request,[
        'name' => 'required|max:255'
      ]);
      //store the database
      $category = new Category;
      $category->name = $request->name;
      $category->save();

      Session::flash('success', 'New Category has been created!');

      return redirect()->route('categories.index');

    }

    public function show($id)
    {
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {
    }
}
