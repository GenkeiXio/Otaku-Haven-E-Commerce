<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function sendContactForm(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required'
        ]);

        Mail::to('bibimeowotakuhaven@gmail.com')->send(new ContactMail($data));

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}


