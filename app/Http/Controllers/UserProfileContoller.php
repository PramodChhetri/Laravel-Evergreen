<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileContoller extends Controller
{
    public function index()
    {
        $userid = Auth::user()->id;
        return view('user.profile.index', compact('userid'));
    }
}
