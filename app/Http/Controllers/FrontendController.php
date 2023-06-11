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
        $products = Product::latest()->paginate(8);
        return view('user.index',compact('products'));
    }

    public function products()
    {
        $products = Product::all();
        return view('user.products',compact('products'));
    }

    public function productslive()
    {
        
        return view('user.productslive');
    }

    public function productdetail($id)
    {
        $product = Product::find($id);
        $relatedproducts = Product::where('category_id', '=', $product->category_id)->paginate(3);
        return view('user.productdetail',compact('product','relatedproducts'));
    }

    public function buyersell()
    {
        return view('user.buyersell');
    }

    public function sellersell()
    {
        return view('user.sellersell');
    }

    public function orders()
    {
        return view('user.orders.index');
    }
}
