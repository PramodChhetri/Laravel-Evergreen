<?php

namespace App\Http\Livewire;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminNotification extends Component
{
    public $queuenotification;
    public $allnotification;
    public $countnotification;

    public function mount()
    {
        $this->loadCartData();
    }

    public function loadCartData()
    {
        $this->queuenotification = Notification::where('user_id', Auth::user()->id)->where('status', 'Queue')->latest()->get();
        $this->allnotification = Notification::where('user_id', Auth::user()->id)
            ->whereIn('status', ['Unread', 'Queue'])
            ->latest()
            ->get();

        $this->countnotification = $this->allnotification->count();
    }


    public function render()
    {
        return view('livewire.admin-notification');
    }
}
