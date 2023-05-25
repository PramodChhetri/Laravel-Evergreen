<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $allproducts = Product::all();
        return view('products.index',compact('allproducts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'numeric|required',
            'stock' => 'numeric|required',
            'description' => 'required',
            'condition' => 'required',
            'brand' => 'required',
            'photopath' => 'required'
        ]);

        if($request->hasFile('photopath')){
            $image = $request->file('photopath');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/products');
            $image->move($destinationPath,$name);
            $data['photopath'] = $name;
        }

        Product::create(array_merge($data, ['user_id' => Auth::user()->id]));
        return redirect(route('products.index'))->with('success','Product Created Successfully');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $allcategories = Category::all();
        return view('products.edit',compact('product','allcategories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $data = $request->validate([
            'category_id' => 'required',
            'name' => 'required|unique:products,name,'.$product->id,
            'price' => 'numeric|required',
            'stock' => 'numeric|required',
            'description' => 'required',
            'condition' => 'required',
            'brand' => 'required',
            'photopath' => 'nullable'
        ]);

        if($request->hasFile('photopath')){
            $image = $request->file('photopath');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/products');
            $image->move($destinationPath,$name);
            File::delete(public_path('images/products/'.$product->photopath));
            $data['photopath'] = $name;
        }

        $product->update($data);
        return redirect(route('products.index'))->with('success','Product Updated Successfully');
    }

    // public function destroy($id)
    // {
    //     $category = Category::find($id);
    //     $category->delete();
    //     return redirect(route('category.index'));
    // }

    public function destroy(Request $request)
    {
        $product = Product::find($request->dataid);
        $product->delete();
        return redirect(route('products.index'))->with('success','Product Deleted Successfully!');
    }
}
