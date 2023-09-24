<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserProfileContoller extends Controller
{
    public function index()
    {
        $userid = Auth::user()->id;
        return view('user.profile.index', compact('userid'));
    }

    public function changeprofileimage(Request $request)
    {
        $user = User::find(Auth::user()->id);
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
        return redirect(route('user.profile.index'))->with('success', 'Profile Image Updated Successfully');
    }

    public function changeprofileinfo(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $user->id,
        ]);

        $user->update($data);
        return redirect(route('user.profile.index'))->with('success', 'Profile Information Updated Successfully');
    }

    public function changeprofilepassword(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|min:8', // 'new-password_confirmation' field must match 'new-password'
        ]);

        if ($request->input('new-password') != $request->input('new-password_confirmation')) {
            return redirect()->back()->with('error', 'New Password and Confirm Password do not match.');
        }

        // Check if the current password is correct
        if (!Hash::check($request->input('current-password'), $user->password)) {
            return redirect()->back()->with('error', 'Current password is incorrect.');
        }

        // Update the user's password
        $user->update([
            'password' => Hash::make($request->input('new-password')),
        ]);

        return redirect()->route('user.profile.index')->with('success', 'Password Updated Successfully');
    }

    public function changebusinessinfo(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $data = $request->validate([
            'phone' => 'required',
            'address' => 'required',
            'panimage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pannumber' => 'required',
        ]);

        if ($request->hasFile('panimage')) {
            $panimage = $request->file('panimage');
            $name = time() . '.' . $panimage->getClientOriginalExtension();
            $destinationPath = public_path('/images/pan');
            $panimage->move($destinationPath, $name);
            $data['panimage'] = $name;
        }

        $user->update($data);
        return redirect(route('user.profile.index'))->with('success', 'Business Information Updated Successfully');
    }

    public function destroy(Request $request)
    {
        // Validate the request here, for example, check if the user is authenticated and authorized to delete their account.

        $userId = $request->input('dataid');
        $user = User::find($userId);

        if ($user) {
            // Check if the image file exists before attempting to unlink it
            if ($user->image !== "default.jpg" &&  $user->image) {
                unlink('images/users/' . $user->image);
            }

            // Check if the panimage file exists before attempting to unlink it
            if ($user->panimage) {
                unlink('images/pan/' . $user->panimage);
            }

            // Delete the user
            $user->delete();

            // Redirect to a success page or appropriate route
            return redirect('/')->with('success', 'User Deleted Successfully!');
        } else {
            // Handle the case where the user was not found
            return redirect()->back()->with('error', 'User not found.');
        }
    }
}
