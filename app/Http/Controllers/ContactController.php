<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactConfirmationMail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    /**
     * Display the contact page.
     */
    public function index()
    {
        return view('contact');
    }

    /**
     * Handle contact form submission.
     */
    public function submit(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10|max:2000',
            'honeypot' => 'max:0', // Honeypot should be empty
            // 'g-recaptcha-response' => config('services.google.recaptcha_enabled') ? 'required|captcha' : 'nullable',
        ]);

        // Check honeypot
        if (!empty($request->honeypot)) {
            return redirect()->route('contact')->with('error', 'Spam detected!')->withInput();
        }

        try {
            // Store the message in database
            $contactMessage = ContactMessage::create($validated);

            $masterEmails = env('MASTER_EMAILS', '');
            $masterRecipients = array_filter(array_map('trim', explode(',', $masterEmails)));

            // Fallback to a sensible default if MASTER_EMAILS not set
            if (empty($masterRecipients)) {
                $masterRecipients = [config('mail.admin_address_1', 'damalide20@gmail.com')];
            }

            // Send confirmation email to user
            Mail::to($masterRecipients)->queue(new ContactFormMail($contactMessage));

            // Mail::to($contactMessage->email)->queue(new ContactConfirmationMail($contactMessage));
            return redirect()->route('contact')->with('success', 'Thank you for your message! We will get back to you within 24 hours.');

        } catch (\Exception $e) {
            // Log the error
            Log::error('Contact form submission failed: ' . $e->getMessage());

            return redirect()->route('contact')->with('error', 'Sorry, something went wrong. Please try again later.')->withInput();
        }
    }
}
