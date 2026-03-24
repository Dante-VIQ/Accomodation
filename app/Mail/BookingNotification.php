<?php

namespace App\Mail;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class BookingNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;

    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

    public function build()
    {
        $managerEmail = config('mail.manager_email', 'manager@villaveh.com');
        
        // Validate email format
        if (!filter_var($managerEmail, FILTER_VALIDATE_EMAIL)) {
            Log::error('Invalid manager email address: ' . $managerEmail);
            $managerEmail = 'manager@villaveh.com'; // fallback to a valid default
        }
        
        return $this->to($managerEmail)
                    ->subject('New Booking Notification - Villaveh Gameview')
                    ->view('emails.booking-notification');
    }
}