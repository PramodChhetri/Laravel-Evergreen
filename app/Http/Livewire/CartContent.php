<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use Livewire\Component;

class CartContent extends Component
{


    public function render()
    {
        $carts = Cart::latest()->get();

        return view('livewire.cart-content', [
            'carts' => $carts
        ]);
    }
}
