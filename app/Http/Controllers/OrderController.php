<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
    // Retrieve the authenticated buyer's ID
    $buyerId = auth()->user()->id;

    // Retrieve orders for the specific buyer
    $orders = Order::with('seller')
        ->where('buyer_id', $buyerId)
        ->latest()->get();

    // Pass the list of orders to the seller's dashboard view
    return view('user.orders.index', compact('orders'));
    }

    
    public function store(Request $request)
    {
    
    // Validation
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'address' => 'required',
        'contact' => 'required',
        'country' => 'required',
        'state' => 'required',
        'zip' => 'required',
        'cart_ids.*' => 'required|integer',
    ]);

    // Get the form input values
    $name = $request->input('name');
    $email = $request->input('email');
    $address = $request->input('address');
    $contact = $request->input('contact');
    $country = $request->input('country');
    $state = $request->input('state');
    $zip = $request->input('zip');

    // Get the cart item IDs from the array
    $cartIds = $request->input('cart_ids');

    if(!$cartIds)
    {
        return back()->with('success','No Cart Value!');
    }

    foreach ($cartIds as $cartId) {

        $cart = Cart::find($cartId);
        $product = Product::find($cart->product_id);
        $sellerId = $product->user_id;
        $buyerId = $cart->user_id;

        $order = new Order();
        $order->buyer_id = $buyerId;
        $order->seller_id = $sellerId;
        $order->product_id = $cart->product_id;
        $order->quantity = $cart->quantity;
        $order->total_price = $cart->quantity * $product->price;
        $order->date = now();
        $order->buyername = $name;
        $order->buyeremail = $email;
        $order->buyeraddress = $address;
        $order->buyercontact = $contact;
        $order->buyerzip = $zip;
        $order->buyercountry = $country;
        $order->buyerstate = $state;
        $order->status = 'Pending';
        $order->payment_method = 'Cash on Delivery';
        $order->save();

        $cart->delete();
        
    }

    return redirect(route('user.orders.index'))->with('success','Order Placed Successful!');
}

 public function ordersdestroy(Request $request)
    {
        $orders= Order::find($request->dataid);
        $orders->delete();
        return redirect(route('user.orders.index'))->with('success','Order Deleted Successfully!');
    }

}
