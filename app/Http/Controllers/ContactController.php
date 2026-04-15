<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminContactMail;
use App\Mail\UserContactMail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'countryCode' => 'nullable|string|max:10',
            'phone_number' => 'required|string|max:20',
            'service' => 'required|string',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Concatenate country code if present, though template asks for 'phone_number'
        if (!empty($validated['countryCode'])) {
            $validated['phone_number'] = $validated['countryCode'] . ' ' . $validated['phone_number'];
        }

        // Send email to the Admin
        Mail::to(env('MAIL_FROM_ADDRESS', 'info@maadhucreatives.com'))->send(new AdminContactMail($validated));

        // Send confirmation email to the User 
        Mail::to($validated['email'])->send(new UserContactMail($validated));

        // Redirect back with a success message
        return back()->with('success', 'Thank you! Your message has been sent successfully. We will get back to you soon.');
    }
}
