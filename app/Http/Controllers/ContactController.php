<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
    $messages = Contact::latest()->get();
    return view('messages.index', compact('messages'));
    }

    public function destroy(Request $request)
    {
        $message= Contact::find($request->dataid);
        $message->delete();
        return redirect(route('messages.index'))->with('success','Message Deleted Successfully!');
    }

    public function send(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'subject' => 'required'
        ]);

        if($this->isOnline()){
            $mail_data = [
                'recipient' => "pramodchhetri2001@gmail.com",
                'fromEmail' => $data['email'],
                'fromName' => $request['name'],
                'subject' => $request['subject'],
                'body' => $request['message']
            ];

            Mail::send('email-template',$mail_data, function($message) use ($mail_data){
                $message->to($mail_data['recipient'])   
                        ->from($mail_data['fromEmail'],$mail_data['fromName'])
                        ->subject($mail_data['subject']);
            });

            Contact::create($data);

            return redirect()->back()->with('success','Message Sent !');
        }else{
            return redirect()->back()->with('error', 'No Connection!');
        }
    }
    
    public function isOnline($site = "https://youtube.com/")
    {
        if(@fopen($site, "r")){
            return true;
        }else{
            return false;
        }
    }
}
