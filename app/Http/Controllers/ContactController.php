<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;

use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store()
    {
        $contact = request()->all();
        Mail::to('fuadakash0430@gmail.com')->send(new ContactFormMail($contact));

        return redirect()->route('home', '/#contact')->with('success', 'Your message has been sent');
    }
}
