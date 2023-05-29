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

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role_id' => 'numeric|required',
            'status' => 'numeric|required',
            'description' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'photopath' => 'nullable'
        ]);

        if($request->hasFile('photopath')){
            $image = $request->file('photopath');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/users');
            $image->move($destinationPath,$name);
            $data['photopath'] = $name;
        }

        User::create($data);
        return redirect(route('allusers.index'))->with('success','User Created Successfully');
    }
}
