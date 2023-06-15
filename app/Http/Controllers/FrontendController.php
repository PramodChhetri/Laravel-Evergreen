<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
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
        $relatedproducts = Product::where('category_id', '=', $product->category_id)->paginate(3);
        return view('user.productdetail',compact('product','relatedproducts'));
    }

    public function buyersell()
    {
        return view('user.buyersell');
    }

    public function updatepan(Request $request, $id)
    {
        $user = User::find($id);
        $data = $request->validate([
            'phone' => 'required',
            'address' => 'required',
            'panimage' => 'required',
            'pannumber' => 'required',
        ]);

        if($request->hasFile('panimage')){
            $panimage = $request->file('panimage');
            $name = time().'.'.$panimage->getClientOriginalExtension();
            $destinationPath = public_path('/images/pan');
            $panimage->move($destinationPath,$name);
            $data['panimage'] = $name;
        }

        $user->update($data);
        return redirect(route('user.buyersell'))->with('success','User Updated Successfully');
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
