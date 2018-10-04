<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email',
            'subject' => 'min:3|max:50',
            'message' => 'min:10|max:500'
        ]);

        $data = array(
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message
        );

          //    dd($request->input());die;

        Mail::send('email.index', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('aleksandarkastro@gmail.com');
            $message->subject($data['subject']);

        });

        Session::flush('success','Your send a message.');

        return redirect('/');
    }
}
