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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10|max:2000',
            'honeypot' => 'max:0', // Honeypot should be empty
            'g-recaptcha-response' => config('services.google.recaptcha_enabled') ? 'required|captcha' : 'nullable',
        ], [
            'name.required' => 'Please enter your name.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'subject.required' => 'Please select a subject.',
            'message.required' => 'Please enter your message.',
            'message.min' => 'Your message should be at least 10 characters.',
            'g-recaptcha-response.required' => 'Please complete the reCAPTCHA verification.',
            'g-recaptcha-response.captcha' => 'reCAPTCHA verification failed. Please try again.',
            'honeypot.max' => 'Spam detected!',
        ]);

        if ($validator->fails()) {
            return redirect()->route('contact')
                ->withErrors($validator)
                ->withInput();
        }

        // Check honeypot
        if (!empty($request->honeypot)) {
            return redirect()->route('contact')
                ->with('error', 'Spam detected!')
                ->withInput();
        }

        try {
            // Store the message in database
            $contactMessage = ContactMessage::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'subject' => $request->subject,
                'message' => $request->message,
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);

            // Send email to admin
            Mail::to(config('mail.contact_to.address', 'admin@serenityheights.com'))
                ->send(new ContactFormMail($contactMessage));

            // Send confirmation email to user
            if (config('mail.send_confirmation', true)) {
                Mail::to($request->email)
                    ->send(new ContactConfirmationMail($contactMessage));
            }

            return redirect()->route('contact')
                ->with('success', 'Thank you for your message! We will get back to you within 24 hours.');

        } catch (\Exception $e) {
            // Log the error
            Log::error('Contact form submission failed: ' . $e->getMessage());

            return redirect()->route('contact')
                ->with('error', 'Sorry, something went wrong. Please try again later.')
                ->withInput();
        }
    }
}