<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'feedback' => 'required',
            'product_id' => 'required|numeric',
        ]);

        Feedback::create(array_merge($data, ['user_id' => Auth::user()->id]));
        return back()->with('success','Feedback Submited Successfully!');
    }
}
