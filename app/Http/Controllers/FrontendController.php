<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(8);
        return view('user.index',compact('products'));
    }

    public function products()
    {
        $products = Product::all();
        return view('user.products',compact('products'));
    }

    public function productdetail($id)
    {
        $product = Product::find($id);
        return view('user.productdetail',compact('product'));
    }
}
