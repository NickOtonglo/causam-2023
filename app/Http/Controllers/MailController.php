<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mail;

class MailController extends Controller
{
    public function store(Request $request) {
        $this->validate($request, [
            'sender_name' => 'required',
            'sender_email' => 'required|email',
            'message' => 'required'
        ]);
        Mail::create($request->all());
        session()->flash('success', 'Your message was received. A member of our team will contact you soon.');
        return view('index');
    }
}
