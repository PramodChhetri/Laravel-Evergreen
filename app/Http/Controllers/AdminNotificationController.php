<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminNotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::where('user_id', Auth::id())->latest()->paginate(10);
        return view('adminnotifications.index', compact('notifications'));
    }
}
