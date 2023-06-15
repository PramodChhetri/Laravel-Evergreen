<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\approval;
use App\Models\User;

class ApprovalController extends Controller
{
    public function index()
    {
        $requests = approval::all();
        return view('approval.index',compact('requests'));
    }

    public function updateuser($id)
    {
        $approvalrequest = approval::find($id); 
        $user = User::find($approvalrequest->user_id);
        $user->update([
            'role_id' => 2,
            'pan_verified_at' => now(),
        ]);
        $approvalrequest->delete();
        return redirect(route('approval.index'))->with('success','User Approved To Sell Products.');
    }

    public function destroy(Request $request)
    {
        $approvalrequest = approval::find($request->dataid);
        $approvalrequest->delete();
        return redirect(route('approval.index'))->with('success','Request Rejected!');
    }
}
