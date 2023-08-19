<?php

namespace App\Http\Controllers;

use App\Events\SellRequestApproved;
use App\Events\SellRequestDeclined;
use Illuminate\Http\Request;
use App\Models\approval;
use App\Models\Notification;
use App\Models\User;

class ApprovalController extends Controller
{
    public function index()
    {
        $requests = approval::where('status', 'Pending')->get();
        return view('approval.index', compact('requests'));
    }

    public function updateuser($id)
    {
        $approvalrequest = approval::find($id);
        $user = User::find($approvalrequest->user_id);
        $user->update([
            'role_id' => 2,
            'pan_verified_at' => now(),
        ]);

        $approvalrequest->update([
            'status' => 'Approved',
        ]);

        $notification = Notification::create([
            'title' => 'SellRequestAccepted',
            'content' => 'Your Sell Request is accepted. Welcome to Evergreen Seller Community. ',
            'status' => 'Queue',
            'user_id' => $user->id,
        ]);
        event(new SellRequestApproved($notification));

        return redirect(route('approval.index'))->with('success', 'User Approved To Sell Products.');
    }

    public function destroy(Request $request)
    {
        $approvalrequest = approval::find($request->dataid);
        $user = User::find($approvalrequest->user_id);

        $notification = Notification::create([
            'title' => 'SellRequestDeclined',
            'content' => 'Your Sell Request is Declined. The information you is not valid. Change and we will review again. ',
            'status' => 'Queue',
            'user_id' => $user->id,
        ]);
        event(new SellRequestDeclined($notification));

        $approvalrequest->delete();
        return redirect(route('approval.index'))->with('success', 'Request Rejected!');
    }
}
