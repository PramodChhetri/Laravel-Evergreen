<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartContent extends Component
{
    public $carts;
    public $cartcount;
    public $sum;

    public function mount()
    {
        $this->loadCartData();
    }

    public function loadCartData()
    {
        if (!Auth::check()) {
            $this->carts = [];
            $this->cartcount = 0;
        } else {
            $this->carts = Cart::where('user_id', Auth::user()->id)->latest()->get();
            $this->cartcount = $this->carts->count();
        }

        $this->calculateTotal();
    }

    public function incrementQty($id)
    {
        $cart = Cart::find($id);
        $cart->quantity += 1;
        $cart->save();
        session()->flash('success', 'Quantity Updated!');
        $this->loadCartData();
    }

    public function removeCart($id)
    {
        Cart::destroy($id);
        session()->flash('success', 'Item has been removed!');
        $this->loadCartData();
    }

    public function calculateTotal()
    {
        $this->sum = $this->carts->sum(function ($cart) {
            return $cart->quantity * $cart->product->price;
        });
    }

    public function render()
    {
        return view('livewire.cart-content');
    }
}
