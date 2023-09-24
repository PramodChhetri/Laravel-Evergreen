<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;

use Illuminate\Http\Request;

class AllUserController extends Controller
{
    public function index()
    {
        $allusers = User::all();
        return view('allusers.index', compact('allusers'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('allusers.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'role_id' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'password' => 'required|confirmed',
            'status' => 'required|numeric',
            'phone' => 'required',
            'address' => 'required',
            'panimage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pannumber' => 'nullable',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/users');
            $image->move($destinationPath, $name);
            $data['image'] = $name;
        }

        if ($request->hasFile('panimage')) {
            $panimage = $request->file('panimage');
            $name = time() . '.' . $panimage->getClientOriginalExtension();
            $destinationPath = public_path('/images/pan');
            $panimage->move($destinationPath, $name);
            $data['panimage'] = $name;
        }

        User::create($data);
        return redirect(route('allusers.index'))->with('success', 'User Created Successfully');
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('allusers.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $user->id,
            'role_id' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|numeric',
            'phone' => 'required',
            'address' => 'required',
            'panimage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pannumber' => 'nullable',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/users');
            $image->move($destinationPath, $name);
            $data['image'] = $name;
        }

        if ($request->hasFile('panimage')) {
            $panimage = $request->file('panimage');
            $name = time() . '.' . $panimage->getClientOriginalExtension();
            $destinationPath = public_path('/images/pan');
            $panimage->move($destinationPath, $name);
            $data['panimage'] = $name;
        }

        $user->update($data);
        return redirect(route('allusers.index'))->with('success', 'User Updated Successfully');
    }

    public function destroy(Request $request)
    {
        $user = User::find($request->dataid);
        if ($user->image != "default.jpg") {
            unlink('images/users/' . $user->image);
        }
        unlink('images/pan/' . $user->panimage);
        $user->delete();
        return redirect(route('allusers.index'))->with('success', 'User Deleted Successfully!');
    }

    // Profile picture update
    public function updatePP(Request $request, $id)
    {
        $user = User::find($id);
        $data = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/users');
            $image->move($destinationPath, $name);
            $data['image'] = $name;
        }

        $user->update($data);
        return redirect(route('profile.edit'))->with('success', 'Profile Picture Updated Successfully');
    }
}
