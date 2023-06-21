<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index()
    {
    $orders = Order::with('buyer','seller')->latest()->get();

    // Pass the list of orders to the seller's dashboard view
    return view('orders.index', compact('orders'));
    }

    public function ordersdestroy(Request $request)
    {
        $orders= Order::find($request->dataid);
        $orders->delete();
        return redirect(route('orders.index'))->with('success','Order Deleted Successfully!');
    }
}
