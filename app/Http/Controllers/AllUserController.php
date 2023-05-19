<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Role;
use App\Models\User;

use Illuminate\Http\Request;

class AllUserController extends Controller
{
    public function index()
    {
        $allusers = User::all();
        return view('allusers.index',compact('allusers'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('allusers.create',compact('roles'));
    }
}
