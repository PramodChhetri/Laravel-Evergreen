<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carts = Cart::where('user_id',auth()->user()->id)->get();
        return view('user.orders.cart',compact('carts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'quantity' => 'required',
            'product_id' => 'required'
        ]);
        $data['user_id'] = auth()->user()->id;

        // check already exists
        $check = Cart::where('product_id',$data['product_id'])->where('user_id',$data['user_id'])->count();
        if($check > 0){
            return back()->with('success','Item already added to Cart');
        }

        Cart::create($data);
        return back()->with('success','Item added to Cart');

    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
