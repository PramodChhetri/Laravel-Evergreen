<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartContent extends Component
{
    public $carts;
    public $cartcount;
    public $queuenotification;
    public $allnotification;
    public $countnotification;
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
            $this->queuenotification = [];
            $this->countnotification = 0;
        } else {
            $this->carts = Cart::where('user_id', Auth::user()->id)->latest()->get();
            $this->cartcount = $this->carts->count();
            $this->queuenotification = Notification::where('user_id', Auth::user()->id)->where('status', 'Queue')->latest()->get();
            $this->allnotification = Notification::where('user_id', Auth::user()->id)
                ->whereIn('status', ['Unread', 'Queue'])
                ->latest()
                ->get();

            $this->countnotification = $this->allnotification->count();
        }

        $this->calculateTotal();
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
