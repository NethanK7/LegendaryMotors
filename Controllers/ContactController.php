<?php

namespace Controllers;

use Controllers\Controller;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(\Illuminate\Http\Request $request)
    {
        $validated = $request->validate([
            'subject' => 'required|string|max:100',
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|email|max:100',
            'message' => 'required|string|max:2000',
        ]);

        // Logic to send email would go here
        // Mail::to('admin@legendarymotors.com')->send(new ContactFormMail($validated));

        return back()->with('status', 'Thank you for your inquiry. Our concierge team will reach out shortly.');
    }
}
