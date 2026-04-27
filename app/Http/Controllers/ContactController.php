<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'company' => 'nullable|string|max:255',
            'service' => 'nullable|string|max:255',
            'budget' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        $adminEmail = env('ADMIN_RECEIVER_EMAIL', 'info@simhainteractive.com');

        // Send email to the Admin
        Mail::to($adminEmail)->send(new ContactFormMail($validated));

        // Redirect back with a success message
        return back()->with('success', 'Thank you! Your message has been sent successfully. We will get back to you shortly.');
    }
}
