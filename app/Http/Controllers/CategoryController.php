<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $allcategories = Category::all();
        return view('category.index',compact('allcategories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:categories|max:255',
            'priority' => 'required|numeric'
        ],
        [
            'name.required' => 'Please Enter Category Name',
            'priority.required' => 'Please Enter Periority',
        ]
    );

        Category::create($data);
        return redirect(route('category.index'))->with('success','Category Created Successfully!');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('category.edit',compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $data = $request->validate([
            'name' => 'required|max:255|unique:categories,name,'.$category->id,
            'priority' => 'required|numeric'
        ]);

        $category = Category::find($id);
        $category->update($data);
        return redirect(route('category.index'))->with('success','Category Updated Successfully!');
    }

    // public function destroy($id)
    // {
    //     $category = Category::find($id);
    //     $category->delete();
    //     return redirect(route('category.index'));
    // }

    public function destroy(Request $request)
    {
        $category = Category::find($request->dataid);
        $category->delete();
        return redirect(route('category.index'))->with('success','Category Deleted Successfully!');
    }


}
