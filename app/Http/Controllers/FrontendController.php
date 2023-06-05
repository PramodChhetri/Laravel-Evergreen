<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $carts = Cart::where('user_id',auth()->user()->id)->get();
        $products = Product::latest()->paginate(8);
        return view('user.index',compact('products','carts'));
    }

    public function products()
    {
        $products = Product::all();
        $carts = Cart::where('user_id',auth()->user()->id)->get();
        return view('user.products',compact('products','carts'));
    }

    public function productslive()
    {
        $products = Product::all();
        $carts = Cart::where('user_id',auth()->user()->id)->get();
        return view('user.productslive',compact('products','carts'));
    }

    public function productdetail($id)
    {
        $carts = Cart::where('user_id',auth()->user()->id)->get();
        $product = Product::find($id);
        return view('user.productdetail',compact('product','carts'));
    }

    public function buyersell()
    {
        $carts = Cart::where('user_id',auth()->user()->id)->get();
        return view('user.buyersell',compact('carts'));
    }

    public function orders()
    {
        $carts = Cart::where('user_id',auth()->user()->id)->get();
        return view('user.orders.index',compact('carts'));
    }
}
