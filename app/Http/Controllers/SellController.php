<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SellController extends Controller
{
    public function index()
    {       
        return view('user.sell.index');
    }

    public function manageproducts()
    {       
        $products = Product::all();
        return view('user.sell.manageproducts',compact('products'));
    }

    public function managestocks()
    {       
        $products = Product::all();
        return view('user.sell.managestocks',compact('products'));
    }
}
