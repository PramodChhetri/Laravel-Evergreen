<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
    // Retrieve the authenticated buyer's ID
    $buyerId = auth()->user()->id;

    // Retrieve orders for the specific buyer
    $orders = Order::with('seller','orderDetails')
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

        $existingOrder = Order::where('buyer_id', $buyerId)
        ->where('seller_id', $sellerId)
        ->first();
        
        if(!$existingOrder)
        {
            // Create a new order
            $order = new Order();
            $order->buyer_id = $buyerId;
            $order->seller_id = $sellerId;
            $order->save();

            $orderDetail = new OrderDetail();
            $orderDetail->order_id = $order->id;
            $orderDetail->product_id = $cart->product_id;
            $orderDetail->quantity = $cart->quantity;
            $orderDetail->total_price = $cart->quantity * $product->price;
            $orderDetail->date = now();
            $orderDetail->buyername = $name;
            $orderDetail->buyeremail = $email;
            $orderDetail->buyeraddress = $address;
            $orderDetail->buyercontact = $contact;
            $orderDetail->buyerzip = $zip;
            $orderDetail->buyercountry = $country;
            $orderDetail->buyerstate = $state;
            $orderDetail->status = 'Pending';
            $orderDetail->payment_method = 'Cash on Delivery';
            $orderDetail->save();

            $cart->delete();



        }else
        {
            
            $orderDetail = new OrderDetail();
            $orderDetail->order_id = $existingOrder->id;
            $orderDetail->product_id = $cart->product_id;
            $orderDetail->quantity = $cart->quantity;
            $orderDetail->total_price = $cart->quantity * $product->price;
            $orderDetail->date = now();
            $orderDetail->buyername = $name;
            $orderDetail->buyeremail = $email;
            $orderDetail->buyeraddress = $address;
            $orderDetail->buyercontact = $contact;
            $orderDetail->buyerzip = $zip;
            $orderDetail->buyercountry = $country;
            $orderDetail->buyerstate = $state;
            $orderDetail->status = 'Pending';
            $orderDetail->payment_method = 'Cash on Delivery';
            $orderDetail->save();

            $cart->delete();
        }
        
        
    }

    return redirect(route('user.orders.index'))->with('success','Order Placed Successful!');
}

}
