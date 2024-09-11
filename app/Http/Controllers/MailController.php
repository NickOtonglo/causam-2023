<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mail;
use App\Events\ContactInfoSubmitted;

class MailController extends Controller
{
    public function store(Request $request) {
        $this->validate($request, [
            'sender_name' => 'required',
            'sender_email' => 'required|email',
            'message' => 'required'
        ]);

        $mail = new Mail;
        $mail->sender_name = $request->sender_name;
        $mail->sender_email = $request->sender_email;
        $mail->message = $request->message;

        Mail::create($request->all());

        // event(new ContactInfoSubmitted($mail));

        session()->flash('success', 'Your message was received. A member of our team will contact you soon.');
        return view('index');
    }
}
